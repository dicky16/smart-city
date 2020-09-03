$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    loadDataWisata();
    function loadDataWisata() {
      $('#table-wisata').load('/admin/wisata/datatable', function() {
          var host = window.location.origin;
          $('#datatable-wisata').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                  url: '/admin/wisata/data',
                  type: 'GET'
              },
              columns: [
                  {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                  {data: 'nama',name: 'nama'},
                  {data: 'deskripsi',name: 'deskripsi'},
                  {data: 'kapasitas_parkir',name: 'kapasitas_parkir'},
                  {data: 'aksi',name: 'aksi', searchable: false, orderable: false},
              ]
          });
      });
  }
  });
