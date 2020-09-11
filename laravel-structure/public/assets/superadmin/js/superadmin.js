$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    loadDataAdmin();
    function loadDataAdmin() {
            $('#table-admin').load('/superadmin/datatable', function() {
                var host = window.location.origin;
                $('#datatable-admin').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/superadmin/data',
                        type: 'GET'
                    },
                    columns: [
                        {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                        {data: 'name',name: 'name'},
                        {data: 'email',name: 'email'},
                        {
                            data: 'gambar',
                            name: 'gambar',
                            "render": function(data, type, row) {
                                return '<img src=" ' + host + '/'+ data + ' " style="height:100px;width:100px;"/>';
                            },
                            searchable: false
                        },
                        {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
                    ]
                });
            });
    }

});
