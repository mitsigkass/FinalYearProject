@extends('layouts.app')
<!--
 * This is a Northumbria University Coursework.
 *
 *  @author mitsigkas
-->

@section('title')
My Profile
@endsection


@section('content')

<div class="container" style="text-align:center;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Contact Us - File A Report</div>

                <div class="card-body">
                  @if(session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status')}}
                    </div>
                    @endif
                  <form action="{{ url('reportsend')}}" method="POST">
                    {{ csrf_field() }}


                    <div class="row">


                      <textarea name="description" placeholder="Description"rows="8" cols="80"></textarea>

                      <div class="col-md-4">
                        <div class="form-group">
                      <button type="submit" class="btn btn-primary">Send Report</button>
                      </div>


                    </div>


                    </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
