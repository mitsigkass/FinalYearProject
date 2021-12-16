@extends('layouts.app')
<!-- @author Sotiris Mitsigkas-->
@section('title')
My Profile
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My profile page</div>

                <div class="card-body">
                  @if(session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status')}}
                    </div>
                    @endif
                  <form action="{{ url('myprofile-update')}}" method="POST">
                    {{ csrf_field() }}


                    <div class="row">


                      <div class="col-md-4">
                        <div class="form-group">
                        <label for="">Name</label>
                        <input for="text" name="name" class="form-control"
                         value="{{ Auth::user()->name}}">
                         </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label for="">Email</label>
                        <input for="text" readonly class="form-control"
                         value="{{ Auth::user()->email}}">
                         </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="">Address</label>
                        <input for="text" name="address" class="form-control"
                         value="{{ Auth::user()->address}}">
                         </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label for="">Phone Number</label>
                        <input for="text" name="phonenumber" class="form-control"
                         value="{{ Auth::user()->phonenumber}}">
                         </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                      <button type="submit" class="btn btn-primary">Update Profile</button>
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
