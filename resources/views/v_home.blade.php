<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Maxie skincare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('eventalk-master/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('eventalk-master/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('eventalk-master/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('eventalk-master/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('eventalk-master/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('eventalk-master/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('eventalk-master/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('eventalk-master/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('eventalk-master/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="{{ asset('eventalk-master/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('eventalk-master/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('eventalk-master/css/style.css') }}">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="#">Maxie<span>Skincare.</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Qrcode</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Schedule</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
	          <li class="nav-item cta mr-md-2"><a href="#" class="nav-link">Login</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('eventalk-master/images/logo.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text  js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4 " data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">  Reward <br><span>Maxie skincare</span></h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Januari 12, 2023. Makassar, Indonesia</p>
            <div id="timer" class="d-flex mb-3">
						  <div class="time" id="days"></div>
						  <div class="time pl-4" id="hours"></div>
						  <div class="time pl-4" id="minutes"></div>
						  <div class="time pl-4" id="seconds"></div>
						</div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="
              icon"><span class="flaticon-placeholder"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Lokasi</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis ex, deleniti earum fugit ducimus minima!</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-world"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Transport</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis ex, deleniti earum fugit ducimus minima!</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-hotel"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Hotel</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis ex, deleniti earum fugit ducimus minima!</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-cooking"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Restaurant</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis ex, deleniti earum fugit ducimus minima!</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
   	
   

    
   @if($id_tamu !== null && $tamu)
   <section>
    <div class="container my-4">
        <div class="row">
            <div class="col-sm-12">
                <h4>Detail Tamu</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {{-- qrcode here --}}
                <div id="qrcode_tamu"></div>
            </div>
            <div class="col-sm-9">
                <p><i class="fas fa-users"></i> No Team : {{ $tamu-> no_team }}</p>
                <p><i class="fab fa-facebook"></i> Facebook : {{ $tamu->facebook }}</p>
                <p><i class="fab fa-whatsapp"></i> Whatsapp : {{ $tamu->whatsapp }}</p>
                <p><i class="fas fa-location"></i> Kota asal : {{ $tamu->kota_asal }}</p>
                <p><i class="fas fa-sync"></i> Status : {{ $tamu->status }}</p>

            </div>
        </div>
    </div>
</section>
   @endif


		
	
   

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://samtam.tech" target="_blank">Samtam tech</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('eventalk-master/js/jquery.min.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/popper.min.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/aos.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('eventalk-master/js/google-map.js') }}"></script>
  <script src="{{ asset('eventalk-master/js/main.js') }}"></script>
  {{-- scanner --}}
<script src="{{ asset('plugins/scanner/html5-qrcode.min.js') }}"></script>

<script src="{{ asset('plugins/qrcodejs/qrcode.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var qrcode = new QRCode("qrcode_tamu", {
            text: '{{ $id_tamu }}',
            width: 200,
            height: 200,
            colorDark : "#222831",
            colorLight : "#fff",
            correctLevel : QRCode.CorrectLevel.H
        });

    });
</script>
  </body>
</html>