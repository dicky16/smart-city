$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '#btn-edit-profile', function(e) {
      e.preventDefault();
      var formData = new FormData();

      var nama = $('input[name=name]').val();
      var email = $('input[name=email]').val();
      var gambar = $('#gambar')[0].files[0];
      var id = $('input[name=edit-id]').val();

      formData.append('nama', nama);
      formData.append('email', email);
      formData.append('gambar', gambar);
      if(nama == "" || email == "") {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Nama dan Email tidak boleh kosong!',
          timer: 1200,
          showConfirmButton: false
        })
      } else {
      $.ajax({
        type: 'POST',
        url: '/admin/profil/' + id,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Berhasil edit profil!',
              timer: 1200,
              showConfirmButton: false
            })
            location.reload();
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

  });
