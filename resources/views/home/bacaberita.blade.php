<!doctype html>
<html lang="zxx">


<!-- Mirrored from cutesolution.com/html/Techvio/services.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Mar 2022 04:41:55 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title -->
	<title>E-Pajak BatangHari</title>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('home') }}/assets/img/batanghari.png">
	<!-- Bootstrap Min CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/bootstrap.min.css">
	<!-- Animate Min CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/animate.min.css">
	<!-- FlatIcon CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/flaticon.css">
	<!-- Font Awesome Min CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/fontawesome.min.css">
	<!-- Mran Menu CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/meanmenu.css">
	<!-- Magnific Popup Min CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/magnific-popup.min.css">
	<!-- Nice Select Min CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/nice-select.min.css">
	<!-- Swiper Min CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/swiper.min.css">
	<!-- Owl Carousel Min CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/owl.carousel.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="{{ asset('home') }}/assets/css/responsive.css">
</head>

<body>

	<!-- Start Preloader Area -->
	<div class="preloader">
		<div class="loader">
			<div class="shadow"></div>
			<div class="box"></div>
		</div>
	</div>
	<!-- End Preloader Area -->
	
	<!-- Start Navbar Area -->
	<div class="navbar-area">
		<div class="techvio-responsive-nav">
			<div class="container">
				<div class="techvio-responsive-menu">
					<div class="logo">
						<a href="index-2.html">
							<img src="{{ asset('home') }}/assets/img/logo.png" class="white-logo" alt="logo">
							<img src="{{ asset('home') }}/assets/img/logo-black.png" class="black-logo" alt="logo">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="techvio-nav">
			@include('menu')
		</div>
	</div>
	<!-- End Navbar Area -->
	
	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg3">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>Berita</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	
	<!-- Start Services Section -->
	<section class="services-section section-padding">
		<div class="container">
			<div class="row" id="canvas">
                @foreach ($berita as $item)
                <div class="col-lg-4 col-md-6">
					<div class="single-services-item">
						<div class="services-icon">
							<img src="data:image/{{ $item->type }};base64,{{ $item->gambar }}" width="200px" alt="">
						</div>
						<h3>{{ $item->judul }}</h3>
						<p>{{ substr($item->isi,0,100) }}</p>
						<div class="services-btn-link">
							<button onclick="readmore({{ $item->id }})" class="btn btn-danger">Read More</button>
						</div>
					</div>
				</div>
                @endforeach
			</div>
			<div id="detail">

			</div>
		</div>
	</section>
	<div class="go-top">
		<i class="fas fa-chevron-up"></i>
		<i class="fas fa-chevron-up"></i>
	</div>
	<!-- End Go Top Section -->
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
	<script>
		function readmore($id){
			$('#canvas').slideUp('fast');
			$.ajax({
				url: "{{ url('/berita/home') }}/"+$id,
				type: "GET",
				success: function(data){
					$('#detail').html(data);
				}
			});
		}
	</script>
	<!-- jQuery Min JS -->
	<script src="{{ asset('home') }}/assets/js/jquery.min.js"></script>
	<!-- Popper Min JS -->
	<script src="{{ asset('home') }}/assets/js/popper.min.js"></script>
	<!-- Bootstrap Min JS -->
	<script src="{{ asset('home') }}/assets/js/bootstrap.min.js"></script>
	<!-- MeanMenu JS  -->
	<script src="{{ asset('home') }}/assets/js/jquery.meanmenu.js"></script>
	<!-- Appear Min JS -->
	<script src="{{ asset('home') }}/assets/js/jquery.appear.min.js"></script>
	<!-- CounterUp Min JS -->
	<script src="{{ asset('home') }}/assets/js/jquery.waypoints.min.js"></script>
	<script src="{{ asset('home') }}/assets/js/jquery.counterup.min.js"></script>
	<!-- Owl Carousel Min JS -->
	<script src="{{ asset('home') }}/assets/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup Min JS -->
	<script src="{{ asset('home') }}/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Nice Select Min JS -->
	<script src="{{ asset('home') }}/assets/js/jquery.nice-select.min.js"></script>
	<!-- Isotope Min JS -->
	<script src="{{ asset('home') }}/assets/js/isotope.pkgd.min.js"></script>
	<!-- Swiper Min JS -->
	<script src="{{ asset('home') }}/assets/js/swiper.min.js"></script>
	<!-- WOW Min JS -->
	<script src="{{ asset('home') }}/assets/js/wow.min.js"></script>
	<!-- Main JS -->
	<script src="{{ asset('home') }}/assets/js/main.js"></script>
	
</body>


<!-- Mirrored from cutesolution.com/html/Techvio/services.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Mar 2022 04:41:55 GMT -->
</html>
{{-- @extends('home.home')
@section('content')
<div class="home-area">
    <section class="services-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h6 style="font-size: 33px">Berita</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($berita as $item)
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ \Storage::url($item->gambar) }}" width="20px" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{ $item->judul }}<small class="text-muted"> {{ $item->created_at->diffForHumans() }}</small></h5>
                              <p class="card-text">{{ substr($item->isi,0,100) }}</p>
                              <a href="#" class="btn btn-primary">Selengkapnya</a>
                            </div>
                          </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection --}}