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
<span>Registered Users</span>


      </h4>


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
            <table id="datatable1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                    <th>Role</th>
                    <th>Ban/unBan</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($users as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->role_as}}</td>
                  <td>
                    @if($item->isban == '0')
                    <label class="py-2 px-3 badge btn-primary">Not Banned</label>
                    @elseif($item->isban == '1')
                      <label class="py-2 px-3 badge btn-danger">Banned</label>
                    @endif

                  </td>

              <td>
                <a href="{{ url('role-edit/'.$item->id) }}"class="badge badge-pill btn-primary px-3 py-3">EDIT</a>
              <a href="{{ url('user-delete/'.$item->id) }}" class="badge badge-pill btn-danger px-3 py-3">DELETE</a>
            </td>
                    @endforeach
                    </tr>
              </tbody>

            </table>


          </div>

        </div>

      </div>

    </div>
      </div>


</div>



@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#datatable1').DataTable({

    });



} );
</script>

@endsection
