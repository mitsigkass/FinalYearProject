@extends('layouts.app')
<!-- @author Sotiris Mitsigkas-->
@section('title')
My Profile
@endsection


@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Ads page</div>

                <div class="card-body">
                  @if(session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status')}}
                    </div>
                    @endif


              <div class="row">
              <div class="card-body">
                          @if(count($advertisements)>0)
                          @foreach($advertisements as $row)

                          <form action="{{ url('myadsupdate/'.$row->id)}}" method="POST">
                            {{ csrf_field() }}

                          <div class="col-md-8">
                            <div class="productCard">

                              <div class="col-md-5">
                                <div class="form-group">
                              <img src=<?php echo strtok($row->photos, ',')?> style="width:auto;height:300px;">

                                 </div>
                              </div>
                            </div>



                              <div class="col-md-10">
                                <div class="form-group">
                                <label for="">Product Name</label>
                                <input for="text" name="productname"  class="form-control"
                                 value="{{$row->productname}}">
                                 </div>
                              </div>

                              <div class="col-md-10">
                                <div class="form-group">
                                <label for="">Seller Name</label>
                                <input for="text" name="sellername" readonly class="form-control"
                                 value="{{$row->sellername}}">
                                 </div>
                              </div>

                              <div class="col-md-10">
                                <div class="form-group">
                                <label for="">Price for Sale</label>
                                <input for="text" name="expsellprice"  class="form-control"
                                 value="{{$row->expsellprice}}">
                                 </div>
                              </div>

                              <div class="col-md-10">
                                <div class="form-group">
                                <label for="">Location</label>
                                <input for="text" name="location"  class="form-control"
                                 value="{{$row->location}}">
                                 </div>
                              </div>

                              <div class="col-md-10">
                                <div class="form-group">
                                <label for="">Description</label>
                                <input for="text" name="description"  class="form-control"
                                 value="{{$row->description}}">
                                 </div>
                              </div>



                              <div class="col-md-10">
                                <div class="form-group">
                              <button href="{{ url('myadsupdate/'.$row->id) }}" type="submit" class="btn btn-primary">Update Ad</button>
                              <a href="{{ url('deletead/'.$row->id) }}" class="btn btn-danger" >Delete Ad</a>
                              </div>


                            </div>


                            </div>


                            </form>

                          @endforeach
                          @else
                          <p>No Ads found.</p>
                          @endif




                      </div>


                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
