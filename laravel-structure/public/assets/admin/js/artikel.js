$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    loadDataArtikel();
    function loadDataArtikel() {
            $('#table-artikel').load('/admin/artikel/datatable', function() {
                var host = window.location.origin;
                $('#datatable-artikel').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/admin/artikel/data',
                        type: 'GET'
                    },
                    columns: [
                        {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                        {data: 'nama',name: 'nama'},
                        {data: 'deskripsi',name: 'deskripsi'},
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

    //tambah artikel
    $('body').on('submit', '#form-tambah-artikel', function(e) {
      e.preventDefault();
      var formData = new FormData();

      var nama = $('input[name=nama]').val();
      var deskripsi = tinymce.get('deskripsi-artikel').getContent();
      var gambar = $('#gambar')[0].files[0];

      formData.append('judul', nama);
      formData.append('deskripsi', deskripsi);
      formData.append('gambar', gambar);

      if(nama == "" || deskripsi == null) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Field tidak boleh kosong!',
          timer: 1200,
          showConfirmButton: false
        })
      } else if(gambar == null){
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
        url: '/admin/artikel',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Berhasil tambah artikel!',
              timer: 1200,
              showConfirmButton: false
            })

            loadDataArtikel();
            $("#form-tambah-artikel").trigger("reset");
            $("#artikelModal").modal("hide");
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
              text: 'Terjadi Kesalahan!',
              timer: 1200,
              showConfirmButton: false
            })
          }
        }
    });
  }
    });

    //edit artikel
    $('body').on('click', '.btn-edit-artikel', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      $('input[name=edit-id]').val(id);
      var host = window.location.origin;
      $.ajax({
        type: 'GET',
        url: '/admin/artikel/edit/' + id,
        contentType: false,
        processData: false,
        success: function(data) {
          $('#editArtikelModal').modal('show');
          $('input[name=nama-edit]').val(data.data[0].nama);
          tinymce.get('deskripsi-artikel-edit').setContent(data.data[0].deskripsi);
          $('#image-edit-artikel').attr('src', host + '/' + data.data[0].gambar);
        }
      });
    });

    //update artikel
    $('body').on('submit', '#form-edit-artikel', function(e) {
      e.preventDefault();
      var formData = new FormData();

      var nama = $('input[name=nama-edit]').val();
      var deskripsi = tinymce.get('deskripsi-artikel-edit').getContent();
      var gambar = $('#gambar-edit')[0].files[0];
      var id = $('input[name=edit-id]').val();

      formData.append('judul', nama);
      formData.append('deskripsi', deskripsi);
      formData.append('gambar', gambar);

      if(nama == "" || deskripsi == null) {
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
        url: '/admin/artikel/update/' + id,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Berhasil tambah artikel!',
              timer: 1200,
              showConfirmButton: false
            })

            loadDataArtikel();
            $("#form-edit-artikel").trigger("reset");
            $("#editArtikelModal").modal("hide");
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
              text: 'Terjadi Kesalahan!',
              timer: 1200,
              showConfirmButton: false
            })
          }
        }
      });
    }
    });

    //hapus artikel
    $('body').on('click', '.btn-delete-artikel', function(e) {
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
                  url: '/admin/artikel/delete/' + id,
                  contentType: false,
                  processData: false,
                  success: function(data) {
                      if(data.status == 'deleted') {
                          Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              )
                              loadDataArtikel();
                          }
                      }
                  });
              }
          })
      });

});
