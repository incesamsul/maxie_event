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

     {{-- sweetalert --}}
     <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

  </head>
  <body>
    
    @if (session('message'))
    {{ sweetAlert(session('message'), 'success') }}
    @endif
    @if (session('error'))
    {{ sweetAlert(session('error'), 'warning') }}
    @endif

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
	          <li class="nav-item cta mr-md-2"><a href="{{ URL::to('/login') }}" class="nav-link">Login</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
      <section class="ftco-section services-section bg-light">
        <div class="container">
          <div class="row d-flex">
            <div class="col-md-6 offset-sm-3">
              <form id="formTamu" action="{{ URL::to('/create_tamu') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="no_team">no_team</label>
                  <select name="no_team" id="no_team" class="form-control">
                    <option value="">--Pilih no team--</option>
                  <option>AO 02</option>
                  <option>AO 03</option>
                  <option>AO 04</option>
                  <option>AO 05</option>
                  <option>AO 12</option>
                  <option>AO 14</option>
                  <option>AO 15</option>
                  <option>AO 18</option>
                  <option>AO 26</option>
                  </select>
                  {{-- <input required type="text" class="form-control" name="no_team" id="no_team"> --}}
                </div>
                <div class="form-group">
                  <label for="facebook">facebook</label>
                  <input required type="text" class="form-control" name="facebook" id="facebook">
                </div>
                <div class="form-group">
                  <label for="whatsapp">no_whatsapp</label>
                  <input required type="number" class="form-control" name="whatsapp" id="whatsapp">
                </div>
                <div class="form-group">
                  <label for="status">status</label>
                  <select required name="status" id="status" class="form-control">
                    <option value="">--pilih status--</option>
                    <option>agen</option>
                    <option>distributor</option>
                    <option>stokis</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="kota_asal">kota_asal</label>
                  <input required type="text" class="form-control" name="kota_asal" id="kota_asal">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary form-control">Daftar</button>
                </form>
                </div>
            </div>
          </div>
        </div>
      </section>
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <img class="mb-3" src="{{ asset('/eventalk-master/images/logo_wb.png  ') }}" alt="" width="100 ">
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

    {{-- sweet alert --}}
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

  </body>
</html>