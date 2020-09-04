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
                        {data: 'kapasitas_parkir_mobil',name: 'kapasitas_parkir_mobil'},
                        {data: 'kapasitas_parkir_motor',name: 'kapasitas_parkir_motor'},
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
      if(nama == "" || deskripsi == "" || mobil == "" || motor == "") {
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
        url: '/admin/wisata',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Berhasil tambah wisata!',
              timer: 1200,
              showConfirmButton: false
            })

            loadDataWisata();
            $("#form-tambah-wisata").trigger("reset");
            $("#wisataModal").modal("hide");
          } else if(data.status = "image_not_valid") {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'File harus berupa gambar!',
              timer: 1200,
              showConfirmButton: false
            })
          } else if(data.status = "empty_image") {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Gambar tidak boleh kosong!',
              timer: 1200,
              showConfirmButton: false
            })
          }
        }
    });
  }
  });

  //edit wisata
  $('body').on('click', '.btn-edit-wisata', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var host = window.location.origin;
    $('input[name=edit-id]').val(id);
    $.ajax({
        type: 'GET',
        url: '/admin/wisata/edit/' + id,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#editWisataModal').modal('show');
            tinymce.get('deskripsi-wisata-edit').setContent(data.data[0].deskripsi);
            $('input[name=nama-edit]').val(data.data[0].nama);
            $('input[name=mobil-edit]').val(data.data[0].kapasitas_parkir_mobil);
            $('input[name=motor-edit]').val(data.data[0].kapasitas_parkir_motor);
            $('#image-edit-wisata').attr('src', host + '/' + data.data[0].gambar);
        }
    });
  });

  //update wisata
  $('body').on('submit', '#form-edit-wisata', function(e) {
    e.preventDefault();
    var id = $('input[name=edit-id]').val();
    var formData = new FormData();

    var nama = $('input[name=nama-edit]').val();
    var deskripsi = tinymce.get('deskripsi-wisata-edit').getContent();
    var mobil = $('input[name=mobil-edit]').val();
    var motor = $('input[name=motor-edit]').val();
    var gambar = $('#gambar-edit')[0].files[0];

    formData.append('nama', nama);
    formData.append('deskripsi', deskripsi);
    formData.append('mobil', mobil);
    formData.append('motor', motor);
    formData.append('gambar', gambar);
    if(nama == "" || deskripsi == "" || mobil == "" || motor == "") {
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
      url: '/admin/wisata/update/' + id,
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == 'ok') {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil edit wisata!',
            timer: 1200,
            showConfirmButton: false
          })

          loadDataWisata();
          $("#form-edit-wisata").trigger("reset");
          $("#editWisataModal").modal("hide");
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

  //hapus wisata
  $('body').on('click', '.btn-delete-wisata', function(e) {
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
                url: '/admin/wisata/delete/' + id,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data.status == 'deleted') {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            )
                            loadDataWisata();
                        }
                    }
                });
            }
        })
    });

});
