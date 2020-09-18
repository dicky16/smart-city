$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var lokasi = $('input[name=lokasi]').val();
    var lokasiArr = lokasi.split(",");
    loadWeather(lokasiArr[0], lokasiArr[1]);
    // loadWeather(-7.884492, 112.524885);
    loadPengunjung();
    loadJumlahParkir();
    loadDeskripsiWisata();

    // loadJumlahParkir1();
    var id = $('input[name=detail-id]').val();
    var refKeluar = firebase.database().ref('/wisata/'+ id +'/mobil_keluar');
      refKeluar.on("value", function(snapshot) {
      keluar = snapshot.val();
      loadJumlahParkir();
      // console.log(data);
    }, function (errorObject) {
      console.log("The read failed: " + errorObject.code);
    });

    function loadWeather(lat, lon)
    {
      var key = 'd440bdea7a1217947fd4db75d173538a';
      fetch('http://api.openweathermap.org/data/2.5/forecast?lat='+ lat +'&lon='+ lon +'&appid='+ key)
      .then(function(resp) { return resp.json() }) // Convert data to json
      .then(function(data) {
        var temp = data.list[0].main.temp;
        var celcius = temp - 273.15;
        var celcius = Math.round(celcius);
        $(".suhu").append(celcius+'°');
      })
      .catch(function() {
        // catch any errors
      });
    }

    function loadPengunjung()
    {
      var id = $('input[name=detail-id]').val();
      var ref = firebase.database().ref('/wisata/'+ id +'/jumlah_pengunjung');
      ref.on("value", function(snapshot) {
      var data = snapshot.val();
      console.log(data);
      $("#pengunjung").empty();
      $("#pengunjung").append(data);
      // var ok = $("#pengunjung").attr("data-end-value");
      // console.log(ok);
      // var eleValue = ele.text();
      // var sesi = '{{Session::get('statusLt')}}';
      // if(sesi == "checked") {
      //   firebase.database().ref('lampuTengah').set({
      //       status : 0
      //     });
      //     location.replace('{{ url('/staf/del-lt') }}');
      // } else {
      //   firebase.database().ref('lampuTengah').set({
      //       status : 1
      //     });
      //     location.replace('{{ url('/staf/set-lt') }}');
      // }
    }, function (errorObject) {
      console.log("The read failed: " + errorObject.code);
    });
    }

    function loadJumlahParkir()
    {
      var id = $('input[name=detail-id]').val();
      var masuk = 0;
      var keluar = 0;
      var refMasuk = firebase.database().ref('/wisata/'+ id +'/mobil_masuk');
        refMasuk.on("value", function(snapshot) {
        masuk = snapshot.val();
        var refKeluar = firebase.database().ref('/wisata/'+ id +'/mobil_keluar');
          refKeluar.on("value", function(snapshot) {
          keluar = snapshot.val();

          // console.log(data);
        }, function (errorObject) {
          console.log("The read failed: " + errorObject.code);
        });
        // $.ajax({
        //     type: 'GET',
        //     url: '/wisata/detail/' + 1,
        //     contentType: false,
        //     processData: false,
        //     success: function(data) {
              var kapasitas = $('input[name=kapasitas]').val();
              var tersedia = kapasitas - masuk;
              tersedia = tersedia + keluar;
              $("#jumlah-parkir").empty();
              $("#jumlah-parkir").append(tersedia);
            // }
          // });
      }, function (errorObject) {
        console.log("The read failed: " + errorObject.code);
      });

    }

    function loadJumlahParkir1()
    {
      var masuk = 0;
      var keluar = 0;
      var refKeluar = firebase.database().ref('/wisata/1/mobil_keluar');
        refKeluar.on("value", function(snapshot) {
        keluar = snapshot.val();
        var refMasuk = firebase.database().ref('/wisata/1/mobil_masuk');
          refMasuk.on("value", function(snapshot) {
          masuk = snapshot.val();
          // console.log(data);
        }, function (errorObject) {
          console.log("The read failed: " + errorObject.code);
        });
        $.ajax({
            type: 'GET',
            url: '/wisata/detail-get/' + 1,
            contentType: false,
            processData: false,
            success: function(data) {
              var kapasitas = data.data[0].kapasitas_parkir_mobil;
              var tersedia = kapasitas - masuk;
              tersedia = tersedia + keluar;
              $("#jumlah-parkir").empty();
              $("#jumlah-parkir").append(tersedia);
            }
          });
      }, function (errorObject) {
        console.log("The read failed: " + errorObject.code);
      });

    }

    function loadDeskripsiWisata() {
			var host = window.location.origin;
			$.ajax({
				type: 'GET',
				url: '/wisata/get',
				contentType: false,
				processData: false,
				success: function(data) {
          $("#deskripsi-wisata-detail").append(data.data[0].deskripsi);
        }
      });
    }

});
