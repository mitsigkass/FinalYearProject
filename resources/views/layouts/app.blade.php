<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!--
   * This is a Northumbria University Coursework.
   *
   *  @author mitsigkas
  -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SellMach</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Styles-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        <section class="ftco-section">

<div class="container-fluid px-md-5">
<div class="row justify-content-between">
<div class="col-md-8 order-md-last">
<div class="row">
<div class="col-md-6 text-center">
<a class="navbar-brand" href="{{url('/')}}" style='color: #000;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 20px;
    line-height: 1.2;
    margin-bottom: 30px;'>Sell Mach</a>

    <span style="text-align:center;">Heavy Equipment Marketplace</span>
</div>
<div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
  <form class="form-horizontal" action="{{url('/product/search')}}" method="post">
      {{csrf_field()}}
    <div class="form-group row">
        <div class="col-8">
          <input type="text"  name="searchonproduct" required="true" class="form-control" placeholder="Search" >
        </div>
        <div class="col-4">
          <button type="submit" name="" class="form-control search" value="Search" ><span class="fa fa-search"></span></button>
        </div>
      </div>
    </form>



</div>
</div>
</div>
<div class="col-md-4 d-flex">

</div>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container-fluid">

<div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav m-auto">

<li class="nav-item dropdown">


</li>
<li class="nav-item"><a href="{{url('/')}}" class="nav-link">Home</a></li>
<li class="nav-item"><a href="{{url('/viewAds/AllCategories/1')}}" class="nav-link">Marketplace</a></li>
<li class="nav-item"><a href="{{url('aboutus')}}" class="nav-link">About Us</a></li>
<li class="nav-item"><a href="{{url('contactus')}}" class="nav-link">Contact</a></li>

</ul>


@guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}" style="color: #fff;">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}" style="color: #fff;">{{ __('Register') }}</a>
        </li>
    @endif
@else

    <li class="nav-item dropdown">
        <a id="navbarDropdown" style="color: #fff;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('myprofile') }}">
              My Profile
          </a>
          @if(Auth::user()->role_as == 'admin')
          <a class="dropdown-item" href="{{ url('dashboard') }}">
              Admin Dashboard
          </a>
          @endif

          <a class="dropdown-item" href="{{ url('myads') }}">
              My Ads
          </a>



            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/post-classified-ads')}}" style="color: #fff;">Add An Ad</a>
    </li>

@endguest

</div>


</div>
</nav>

</section>

</div>


        <main class="">
            @yield('content')
        </main>





</body>
<footer>
<div class="footer">
  <!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span></span>
    </div>
    <!-- Left -->


  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Sell-Machinery

        </div>
        <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                  Our Goal
                  </h6>
                  <p>
                    <a href="#!" class="text-reset">In Sell Machinery our goal is to connect people in the Construcion Industry Field.</a>
                  </p>

                </div>
                <!-- Grid column -->


        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> Cyprus, 8300, CY</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            sellmach@outlook.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 357 99549899</p>
          <p><i class="fas fa-print me-3"></i> + 357 99549899</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">This is a Northumbria University Coursework.</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->



</div>

</footer>
</html>


<script type="text/javascript" src="{{ asset('js/popper.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}" ></script>
  <script type="text/javascript">
        $(document).ready(function(){
          var _token = $('input[name="_token"]').val();
          $.ajax({
            url: "{{ route('categories.retrieve') }}",
            method: "POST",
            data: {_token:_token},
            success: function(data){
              //$('#cityList').fadeIn();
              //  $('#cityList').html(data);
            //alert(data);
            }

          });
        });



        $(document).ready(function(){
          if(window.location=='http://20.77.42.76/'){
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url: "{{ route('categories.ads') }}",
              method: "GET",
              data: {_token:_token},
              success: function(data){
              $('#Advertisements').html(data);
              //  $('#categories').html(data);
            //  alert(data);
              }

            });
          }

        });


          $(document).ready(function(){
              $('p img').on('click', function(){
                $('.main').attr('src', $(this).attr('src'));

              });
          });

  </script>
