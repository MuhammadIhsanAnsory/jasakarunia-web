<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title') - Jasa Karunia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('assets/front/fontawesome/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/front/css/open-iconic-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/front/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/magnific-popup.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/front/css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/front/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/jquery.timepicker.css') }}">


  <link rel="stylesheet" href="{{ asset('assets/front/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/icomoon.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/mystyle.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/mystyle.css') }}">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Jasa Jiwa</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav">
          <li class="nav-item hover-border{{ request()->is('') ? 'active' : '' }}"><a href="{{ route('front.index') }}"
              class="nav-link">Home</a></li>
          <li class="nav-item hover-border{{ request()->is('bus*') ? 'active' : '' }}"><a
              href="{{ route('front.bus.index') }}" class="nav-link">Bus</a></li>
          <li class="nav-item hover-border"><a href="#" class="nav-link">Paket Wisata</a></li>
          <li class="nav-item hover-border"><a href="#" class="nav-link">Dekorasi</a></li>
          <li class="nav-item hover-border"><a href="#" class="nav-link">Blog</a></li>
          <li class="nav-item hover-border"><a href="#" class="nav-link">Kontak</a></li>
          <li class="nav-item hover-border"><a href="#" class="nav-link">About</a></li>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">

            <a href="{{ route('front.cart.index') }}" class="nav-link link-cart"><i
                class="fas fa-shopping-cart"></i>@if(Cookie::get('jasakarunia_cart') !== null)<sup><span
                  class="badge badge-success"><i class="fas fa-check"></i></span></sup> @endif</a>

          </li>
          <li class="nav-item">
            @if (auth()->user())
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link link-user">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            @else
            <a href="{{ route('login') }}" class="nav-link link-user"><i class="fas fa-user"></i> Login</a>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  @yield('content')

  <section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2>Subcribe to our Newsletter</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
              there live the blind texts. Separated they live in</p>
            <div class="row d-flex justify-content-center mt-5">
              <div class="col-md-8">
                <form action="#" class="subscribe-form">
                  <div class="form-group d-flex">
                    <input type="text" class="form-control" placeholder="Enter email address">
                    <input type="submit" value="Subscribe" class="submit px-3">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Jasa Jiwa</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
              there live the blind texts. Separated they live in.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Information</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Service</a></li>
              <li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
              <li><a href="#" class="py-2 d-block">Become a partner</a></li>
              <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
              <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">Jln. Lorem ipsum dolor
                    sit amet consectetur adipisicing elit.</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
                      210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">juhahhaa@uhooy.com</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  {{-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" /></svg></div> --}}

  {{-- logout modal --}}
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Anda yakin logout?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
          <a href="{{ route('logout.get') }}" class="btn btn-secondary">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/aos.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script>
  <script src="{{ asset('assets/front/js/google-map.js') }}"></script>
  <script src="{{ asset('assets/front/js/main.js') }}"></script>
  <script src="{{ asset('assets/admin/js/myscript.js') }}"></script>
  @include('sweetalert::alert')

</body>

</html>