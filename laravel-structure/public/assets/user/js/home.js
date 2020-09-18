$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    loadAkomodasi();
    loadArtikel();
    loadKuliner();

		function loadAkomodasi() {
			var host = window.location.origin;
			$.ajax({
				type: 'GET',
				url: '/akomodasi/get',
				contentType: false,
				processData: false,
				success: function(data) {
					for (var i = 0; i < data.data.length; i++) {
            var deskripsi = data.data[i].deskripsi;
            var deskripsiArr = deskripsi.split('.');
						var html = '';
						html =
						'<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">'+
							'<div class="news_post_image"><img src="'+ host +'/'+ data.data[i].gambar +'" alt=""></div>'+
							'<div class="news_post_content">'+
								'<div class="news_post_date d-flex flex-row align-items-end justify-content-start">'+
									'<div>11</div>'+
									'<div>September</div>'+
								'</div>'+
								'<div class="news_post_title"><a href="#">'+data.data[i].nama+'</a></div>'+
								'<div class="news_post_category">'+
									'<ul>'+
										'<li><a href="#">lifestyle & travel</a></li>'+
									'</ul>'+
								'</div>'+
								'<div class="news_post_text" id="deskripsi">'+
								'</div>'+
                deskripsiArr[0]+
							'</div>'+
						'</div>';
						$("#akomodasi").append(html);
					}
				}
			});
		}

    function loadArtikel() {
			var host = window.location.origin;
			$.ajax({
				type: 'GET',
				url: '/artikel/get',
				contentType: false,
				processData: false,
				success: function(data) {
					for (var i = 0; i < data.data.length; i++) {
            var deskripsi = data.data[i].deskripsi;
            var deskripsiArr = deskripsi.split('.');
						var html = '';
						html =
						'<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">'+
							'<div class="news_post_image"><img src="'+ host +'/'+ data.data[i].gambar +'" alt=""></div>'+
							'<div class="news_post_content">'+
								'<div class="news_post_date d-flex flex-row align-items-end justify-content-start">'+
									'<div>11</div>'+
									'<div>September</div>'+
								'</div>'+
								'<div class="news_post_title"><a href="#">'+data.data[i].nama+'</a></div>'+
								'<div class="news_post_category">'+
									'<ul>'+
										'<li><a href="#">lifestyle & travel</a></li>'+
									'</ul>'+
								'</div>'+
								'<div class="news_post_text" id="deskripsi">'+
								'</div>'+
                deskripsiArr[0]+
							'</div>'+
						'</div>';
						$("#artikel").append(html);
					}
				}
			});
		}

    function loadKuliner() {
			var host = window.location.origin;
			$.ajax({
				type: 'GET',
				url: '/kuliner/get',
				contentType: false,
				processData: false,
				success: function(data) {
					for (var i = 0; i < data.data.length; i++) {
            var deskripsi = data.data[i].deskripsi;
            var deskripsiArr = deskripsi.split('.');
						var html = '';
						html =
						'<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">'+
							'<div class="news_post_image"><img src="'+ host +'/'+ data.data[i].gambar +'" alt=""></div>'+
							'<div class="news_post_content">'+
								'<div class="news_post_date d-flex flex-row align-items-end justify-content-start">'+
									'<div>11</div>'+
									'<div>September</div>'+
								'</div>'+
								'<div class="news_post_title"><a href="#">'+data.data[i].nama+'</a></div>'+
								'<div class="news_post_category">'+
									'<ul>'+
										'<li><a href="#">lifestyle & travel</a></li>'+
									'</ul>'+
								'</div>'+
								'<div class="news_post_text" id="deskripsi">'+
								'</div>'+
                deskripsiArr[0]+
							'</div>'+
						'</div>';
						$("#kuliner").append(html);
					}
				}
			});
		}

});
