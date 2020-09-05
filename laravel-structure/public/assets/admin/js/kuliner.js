$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    loadDataKuliner();
    function loadDataKuliner() {
            $('#table-kuliner').load('/admin/kuliner/datatable', function() {
                var host = window.location.origin;
                $('#datatable-kuliner').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/admin/kuliner/data',
                        type: 'GET'
                    },
                    columns: [
                        {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                        {data: 'nama',name: 'nama'},
                        {data: 'deskripsi',name: 'deskripsi'},
                        {data: 'lokasi',name: 'lokasi'},
                        {data: 'jam_buka',name: 'jam_buka'},
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

    //tambah kuliner
    $('body').on('submit', '#form-tambah-kuliner', function(e) {
      e.preventDefault();
      var formData = new FormData();

      var nama = $('input[name=nama]').val();
      var deskripsi = tinymce.get('deskripsi-kuliner').getContent();
      var lat = $('input[name=lat]').val();
      var lon = $('input[name=lon]').val();
      var buka = $('input[name=jam-buka]').val();
      var tutup = $('input[name=jam-tutup]').val();
      var gambar = $('#gambar')[0].files[0];

      var lokasi = lat + ',' + lon;
      var jam_buka_tutup = buka + '-' + tutup;

      formData.append('nama', nama);
      formData.append('deskripsi', deskripsi);
      formData.append('lokasi', lokasi);
      formData.append('jam', jam_buka_tutup);
      formData.append('gambar', gambar);
      if(nama == "" || deskripsi == null || lat == "" || lon == "" || buka == "" || tutup == "") {
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
        url: '/admin/kuliner',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Berhasil tambah kuliner!',
              timer: 1200,
              showConfirmButton: false
            })

            loadDataKuliner();
            $("#form-tambah-kuliner").trigger("reset");
            $("#kulinerModal").modal("hide");
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

  //edit kuliner
  $('body').on('click', '.btn-edit-kuliner', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('input[name=edit-id]').val(id);
    var host = window.location.origin;
    $.ajax({
        type: 'GET',
        url: '/admin/kuliner/edit/' + id,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#editKulinerModal').modal('show');
            var lokasi = data.data[0].lokasi;
            var jam_buka = data.data[0].jam_buka;
            var lokasiArr = lokasi.split(',');
            var jamArr = jam_buka.split('-');
            $('input[name=nama-edit]').val(data.data[0].nama);
            tinymce.get('deskripsi-kuliner-edit').setContent(data.data[0].deskripsi);
            $('input[name=lat-edit]').val(lokasiArr[0]);
            $('input[name=lon-edit]').val(lokasiArr[1]);
            $('input[name=jam-buka-edit]').val(jamArr[0]);
            $('input[name=jam-tutup-edit]').val(jamArr[1]);
            $('#image-edit-kuliner').attr('src', host + '/' + data.data[0].gambar);
        }
    });
  });

  //update kuliner
  $('body').on('submit', '#form-edit-kuliner', function(e) {
    e.preventDefault();
    var formData = new FormData();

    var nama = $('input[name=nama-edit]').val();
    var deskripsi = tinymce.get('deskripsi-kuliner-edit').getContent();
    var lat = $('input[name=lat-edit]').val();
    var lon = $('input[name=lon-edit]').val();
    var buka = $('input[name=jam-buka-edit]').val();
    var tutup = $('input[name=jam-tutup-edit]').val();
    var gambar = $('#gambar-edit')[0].files[0];
    var id = $('input[name=edit-id]').val();

    var lokasi = lat + ',' + lon;
    var jam_buka_tutup = buka + '-' + tutup;

    formData.append('nama', nama);
    formData.append('deskripsi', deskripsi);
    formData.append('lokasi', lokasi);
    formData.append('jam', jam_buka_tutup);
    formData.append('gambar', gambar);
    if(nama == "" || deskripsi == null || lat == "" || lon == "" || buka == "" || tutup == "") {
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
      url: '/admin/kuliner/update/' + id,
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == 'ok') {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil edit kuliner!',
            timer: 1200,
            showConfirmButton: false
          })

          loadDataKuliner();
          $("#form-edit-kuliner").trigger("reset");
          $("#editKulinerModal").modal("hide");
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

//hapus kuliner
$('body').on('click', '.btn-delete-kuliner', function(e) {
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
                url: '/admin/kuliner/delete/' + id,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data.status == 'deleted') {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            )
                            loadDataKuliner();
                        }
                    }
                });
            }
        })
    });

});
