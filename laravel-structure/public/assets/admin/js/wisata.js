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
                        {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
                    ]
                });
            });
    }

    //tambah wisata
    $('body').on('submit', '#form-tambah-wisata', function(e) {
      e.preventDefault();
      var formData = new FormData();

      var nama = $('input[name=nama]').val();
      var deskripsi = tinymce.get('deskripsi-wisata').getContent();
      var mobil = $('input[name=mobil]').val();
      var motor = $('input[name=motor]').val();
      var gambar = $('#gambar')[0].files[0];

      formData.append('nama', nama);
      formData.append('deskripsi', deskripsi);
      formData.append('mobil', mobil);
      formData.append('motor', motor);
      formData.append('gambar', gambar);

      $.ajax({
        type: 'POST',
        url: '/admin/wisata',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data.status == 'ok') {
            alert('ok')
          }
        }
    });
  });


});
