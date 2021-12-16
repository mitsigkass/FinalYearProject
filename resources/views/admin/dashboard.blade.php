@extends('layouts.admin')

@section('content')

<!--
 * This is a Northumbria University Coursework.
 *
 *  @author mitsigkas
-->


<!--Main layout-->

  <div class="container-fluid mt-5">
    <!--  Heading -->
    <div class="card mb-4 wow fadeIn">
        <!-- Card Content -->
        <div class="card-body d-sm-flex justify-content-between">
      <h4 class="mb-2 mb-sm-0 pt-1">
<a href="https://mdbootstrap.com/docs/jquery" target="_blank">Home Page</a>
<span>/</span>
<span>Dashboard</span>


      </h4>


        </div>

    </div>
      </div>
    <!-- Section: Main chart -->
    <section class="mb-4">
      <div class="card">
        <div class="card-header py-3">
          <h5 class="mb-0 text-center"><strong>Sales</strong></h5>
        </div>
        <div class="card-body">
          <canvas class="my-4 w-100" id="myChart" height="380"></canvas>
        </div>
      </div>
    </section>
    <!-- Section: Main chart -->

<!--Main layout-->

@endsection
