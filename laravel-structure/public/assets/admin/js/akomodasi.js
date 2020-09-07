$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    loadDataAkomodasi();
    function loadDataAkomodasi() {
            $('#table-akomodasi').load('/admin/akomodasi/datatable', function() {
                var host = window.location.origin;
                $('#datatable-akomodasi').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/admin/akomodasi/data',
                        type: 'GET'
                    },
                    columns: [
                        {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                        {data: 'nama',name: 'nama'},
                        {data: 'deskripsi',name: 'deskripsi'},
                        {data: 'lokasi',name: 'lokasi'},
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

    //tambah akomodasi
    $('body').on('submit', '#form-tambah-akomodasi', function(e) {
      e.preventDefault();
      var formData = new FormData();

      var nama = $('input[name=nama]').val();
      var deskripsi = tinymce.get('deskripsi-akomodasi').getContent();
      var lat = $('input[name=lat]').val();
      var lon = $('input[name=lon]').val();
      var gambar = $('#gambar')[0].files[0];

      var lokasi = lat + ',' + lon;

      formData.append('nama', nama);
      formData.append('deskripsi', deskripsi);
      formData.append('lokasi', lokasi);
      formData.append('gambar', gambar);
      if(nama == "" || deskripsi == null || lat == "" || lon == "") {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Field tidak boleh kosong!',
          timer: 1200,
          showConfirmButton: false
        })
      } else if(gambar == null) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Gambar tidak boleh kosong!',
          timer: 1200,
          showConfirmButton: false
        })
      } else {
        $.ajax({
        type: 'POST',
        url: '/admin/akomodasi',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Berhasil tambah akomodasi!',
              timer: 1200,
              showConfirmButton: false
            })

            loadDataAkomodasi();
            $("#form-tambah-akomodasi").trigger("reset");
            $("#akomodasiModal").modal("hide");
          } else if(data.status = "image_not_valid") {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'File harus berupa gambar!',
              timer: 1200,
              showConfirmButton: false
            })
          }
        }
    });
  }
  });

  //edit akomodasi
  $('body').on('click', '.btn-edit-akomodasi', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('input[name=edit-id]').val(id);
    var host = window.location.origin;
    $.ajax({
        type: 'GET',
        url: '/admin/akomodasi/edit/' + id,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#editAkomodasiModal').modal('show');
            var lokasi = data.data[0].lokasi;
            var lokasiArr = lokasi.split(',');
            $('input[name=nama-edit]').val(data.data[0].nama);
            tinymce.get('deskripsi-akomodasi-edit').setContent(data.data[0].deskripsi);
            $('input[name=lat-edit]').val(lokasiArr[0]);
            $('input[name=lon-edit]').val(lokasiArr[1]);
            $('#image-edit-akomodasi').attr('src', host + '/' + data.data[0].gambar);
        }
    });
  });

  //update akomodasi
  $('body').on('submit', '#form-edit-akomodasi', function(e) {
    e.preventDefault();
    var formData = new FormData();

    var nama = $('input[name=nama-edit]').val();
    var deskripsi = tinymce.get('deskripsi-akomodasi-edit').getContent();
    var lat = $('input[name=lat-edit]').val();
    var lon = $('input[name=lon-edit]').val();
    var gambar = $('#gambar-edit')[0].files[0];
    var id = $('input[name=edit-id]').val();

    var lokasi = lat + ',' + lon;

    formData.append('nama', nama);
    formData.append('deskripsi', deskripsi);
    formData.append('lokasi', lokasi);
    formData.append('gambar', gambar);
    if(nama == "" || deskripsi == null || lat == "" || lon == "") {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Field tidak boleh kosong!',
        timer: 1200,
        showConfirmButton: false
      })
    } else {
      $.ajax({
      type: 'POST',
      url: '/admin/akomodasi/update/' + id,
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == 'ok') {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil edit akomodasi!',
            timer: 1200,
            showConfirmButton: false
          })

          loadDataAkomodasi();
          $("#form-edit-akomodasi").trigger("reset");
          $("#editAkomodasiModal").modal("hide");
        } else if(data.status = "image_not_valid") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'File harus berupa gambar!',
            timer: 1200,
            showConfirmButton: false
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Terjadi kesalahan!',
            timer: 1200,
            showConfirmButton: false
          })
        }
      }
  });
}
});

//hapus akomodasi
$('body').on('click', '.btn-delete-akomodasi', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var judul = $(this).data('nama');
    Swal.fire({
        title: 'Anda yakin ingin menghapus ' + judul + '?',
        text: "Anda tidak dapat membatalkan aksi ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: '/admin/akomodasi/delete/' + id,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data.status == 'deleted') {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            )
                            loadDataAkomodasi();
                        }
                    }
                });
            }
        })
    });

});
