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

    <title>SellMach - Admin Panel</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Styles-->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/addons/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">






    <style>
    body {
background-color: #fbfbfb;
}
@media (min-width: 991.98px) {
main {
  padding-left: 240px;
}
}

/* Sidebar */
.sidebar {
position: fixed;
top: 0;
bottom: 0;
left: 0;
padding: 58px 0 0; /* Height of navbar */
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
width: 240px;
z-index: 600;
}

@media (max-width: 991.98px) {
.sidebar {
  width: 100%;
}
}
.sidebar .active {
border-radius: 5px;
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
position: relative;
top: 0;
height: calc(100vh - 48px);
padding-top: 0.5rem;
overflow-x: hidden;
overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
    </style>
</head>
<body>

  <!--Main Navigation-->
  <header>

@include('admin.adminnavbar')
@include('admin.adminsidebar')
</header>
<!--Main Navigation-->

<!--Main Layout-->
<main class="pt-5 mx-lg-5" style="margin-top: 58px">
  @yield('content')
</main>


<script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/datatables.min.js') }}" ></script>






@yield('scripts')

</body>

</html>
@include('admin.adminfooter')
