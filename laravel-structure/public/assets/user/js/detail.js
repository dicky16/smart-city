$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    loadWeather(-7.884492, 112.524885);

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

});
