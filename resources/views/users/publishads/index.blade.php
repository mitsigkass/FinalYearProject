@extends('layouts.app')
<!--
 * This is a Northumbria University Coursework.
 *
 *  @author mitsigkas
-->

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <strong>Categories</strong>
        </div>
        <div class="card-body cardcategories">
              <ul class="userpgcategory fa-ul">
                @if(isset($categories))
                  @if(count($categories)>0)
                    @foreach($categories as $category)
                      <li>
                        <a href='{{url('/post-classified-ads/'.preg_replace('/\s+/','',$category->maincategory).'/'.$category->id)}}'>{{$category->maincategory}}</a>
                      </li>
                    @endforeach
                  @else

                @endif
                  @endif

              </ul>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <strong>{{$main->maincategory}}</strong>
        </div>
        <div class="card-body">
          <ul class='nav nav-tabs'>
            <li class="new-item">
              <a class="nav-link" data-togle="tab"
               href="#home">Post an advertisement</a></li>


          </ul>
          <div id="myTabContent" class="tab-content">
            <div id="home">


            </div>

          </div>

          <div id="myTabContent "class="tab-conent">
            <div class="" id="home">
              <h1 style="padding: 10px 10px:" id="selcatmsg"></h1>
              <form class="form-horizontal" enctype="multipart/form-data" method="post"
              action="{{ url('/publishadvertisement') }}" style="padding-Left: 20px;">
              {{csrf_field()}}

              <div class="row">
                <div class="col-lg-6">
                  @if(count($errors)>0)
                    @foreach($errors->all() as $error)

                    @endforeach

                  @endif

                </div>

              </div>


              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-12">
                  <div class="form-group" >
                    <input type="hidden" name="maincategoryid"
                     value={{Request::segment(3) }}>
                     <input type="hidden" name="sellerid"
                      value="{{ Auth::user()->id}}">
                    <label><strong>Select Subcategory</strong></label>
                    <select class="form-control" name="subcategoryid">
                      <option value="">Select</option>
                      @if(count($subcategories)>0)
                        @foreach($subcategories as $subcategory)

                          <option value="{{$subcategory->id}}">{{$subcategory->subcategory}}</option>
                        @endforeach

                      @else()

                      @endif


                    </select>
                  </div>
                </div>
                <label></label>
                @if($errors->has('subcategoryid'))
                <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{$errors->first('subcategoryid')}}</span>
                @endif

              </div>
              <div class="col-lg-6">
                <div class="col-lg-12">
                <div class="form-group" >
                  <label> <strong>Product Name</strong> </label>
                  <input type="text" class="form-control"
                   name="productname" placeholder="Product Name">
                  </div>
                    </div>
                  <label></label>
                  @if($errors->has('productname'))
                  <span class="alert alert-danger"
                   style="margin-left: 13px; padding: 5px;">{{$errors->first('productname')}}</span>
                  @endif
                    </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-12">
                  <div class="form-group" >
                    <label><strong>Name of Seller</strong></label>
                    <input type="text" class="form-control"
                     name="sellername" value="{{ Auth::user()->name}}" readonly>
                  </div>
                </div>
                <label></label>
                @if($errors->has('sellername'))
                <span class="alert alert-danger"
                 style="margin-left: 13px; padding: 5px;">{{$errors->first('sellername')}}</span>
                @endif
              </div>
              <div class="col-lg-6">
                <div class="col-lg-12">
                <div class="form-group" >
                  <label><strong>Expected Selling Price</strong></label>
                  <input type="text" class="form-control"
                   name="expsellprice" placeholder="Expected Selling Price">
                  </div>
                    </div>
                  <label></label>
                  @if($errors->has('expsellprice'))
                  <span class="alert alert-danger"
                   style="margin-left: 13px; padding: 5px;">{{$errors->first('expsellprice')}}</span>
                  @endif
                    </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-12">
                  <div class="form-group" >
                    <label><strong>Contact Method</strong></label>
                    <input type="text" class="form-control"
                     name="contactmethod" value="{{ Auth::user()->phonenumber}}">
                  </div>
                </div>
                <label></label>
                @if($errors->has('contactmethod'))
                <span class="alert alert-danger"
                 style="margin-left: 13px; padding: 5px;">{{$errors->first('contactmethod')}}</span>
                @endif
              </div>
              <div class="col-lg-6">
                <div class="col-lg-12">
                <div class="form-group" >
                  <label><strong>Location</strong></label>
                  <input type="text" class="form-control"
                   name="location" value="{{ Auth::user()->address}}">
                  </div>
                    </div>
                  <label></label>
                  @if($errors->has('location'))
                  <span class="alert alert-danger"
                   style="margin-left: 13px; padding: 5px;">{{$errors->first('location')}}</span>
                  @endif
                    </div>
              </div>


              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-12">
                  <div class="form-group" >
                    <label><strong>Description</strong></label>
                    <input type="text" class="form-control"
                     name="description" placeholder="Description">
                  </div>
                </div>
                <label style="padding: 23px;"></label>
                @if($errors->has('description'))
                <span class="alert alert-danger"
                 style="margin-left: 13px; padding: 5px;">{{$errors->first('description')}}</span>
                @endif

              </div>
              <div class="col-lg-6">
                <div class="col-lg-12">
                <div class="form-group" >
                  <label><strong>Images of the Product (Max 4)</strong></label>
                  <input type="file" class="form-control"
                   name="photos[]" multiple="true">
                  </div>
                    </div>
                  <label style="padding: 23px;"></label>
                  @if($errors->has('photos'))
                  <span class="alert alert-danger"
                   style="margin-left: 13px; padding: 5px;">{{$errors->first('photos')}}</span>
                  @endif
                    </div>
              </div>





              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group" style="text-allign: center;">
                    <button type="submit" class="btn btn-primary"> Post Your Ad</button>
                    <button id="reset" class="btn btn-default">Reset</button>
                  </div>

                </div>

              </div>




              </form>
            </div>
          </div>






        </div>
      </div>

    </div>
  </div>
</div>
</div>

@endsection
