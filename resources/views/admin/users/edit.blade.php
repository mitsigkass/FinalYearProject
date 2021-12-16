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
<span>Edit Role</span>


      </h4>
<form class="d-flex justify-content-center" >
  <input type="search" aria-label="Search" placeholder="Type your query" class="form-control">
  <button class="btn btn-primary btn-sm my-0 p" type="submit">
<i class="fa fa-search"></i>
  </button>
</form>

        </div>

    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            @if(session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status')}}
              </div>
              @endif

              <h4>Current Role: {{$user_roles->role_as}}</h4>
              <h5>
                @if($user_roles->isban == '0')
                 <label class="py-2 px-3 badge btn-primary">Not Banned</label>
                 @elseif($user_roles->isban == '1')
                   <label class="py-2 px-3 badge btn-danger">Banned</label>
                 @endif

              </h5>
            <form  action="{{ URL('role-update/'.$user_roles->id)}}" method="post">
              {{ csrf_field() }}
              @method('PUT')


            <div class="form-group">
              <input type="text" name="name" class="form-control" value="{{$user_roles->name}}">
            </div>
            <div class="form-group">
              <input type="text" readonly class="form-control"value="{{$user_roles->email}}">
            </div>
            <div class="form-group">
            <select  name="role_as" class="form-control">
              <option value="{{$user_roles->role_as}}">--Select Role--</option>
              <option value="">Default-User</option>
              <option value="admin">Admin</option>

            </select>
            </div>

            <div class="form-group">
            <select  name="isban" class="form-control">
              <option value="{{$user_roles->isban}}">--Ban or Un-Ban User--</option>
              <option value="1">Ban</option>
              <option value="0">Un-ban</option>
            </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" >UPDATE</button>

            </div>
          </form>
          </div>

        </div>

      </div>

    </div>
      </div>


</div>



@endsection
