@extends('layouts.app')
<!-- @author Sotiris Mitsigkas-->
@section('content')

<div class="container" >
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
                        <a href='{{url('/viewAds/'.preg_replace('/\s+/','',$category->maincategory).'/'.$category->id)}}'>{{$category->maincategory}}</a>
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
          <strong>Advertisements</strong>
        </div>
        <div class="card-body" >
          @if(isset($product))
            @if(count($product)>0)
            @foreach($product as $ad)
            <?php
             $img = [];
             $img = explode(",",$ad->photos);
             ?>
             <div class="row">
               <div class="col-lg-6">
                 <div class="row featured" id="featured-image">
                   <img class="main" src="{{$img[0]}}" alt="" width="100%">
                   <p>
                     @if(isset($img[1]))
                     <img src="{{$img[1]}}" alt="" width="100px" height="100px" style="padding:3px;">

                     @endif
                     @if(isset($img[2]))
                     <img src="{{$img[2]}}" alt="" width="100px" height="100px" style="padding:3px;">
                     @endif
                     @if(isset($img[3]))
                     <img src="{{$img[3]}}" alt="" width="100px" height="100px" style="padding:3px;">
                     @endif
                     @if(isset($img[0]))
                     <img src="{{$img[0]}}" alt="" width="100px" height="100px" style="padding:3px;">
                     @endif
                   </p>


                 </div>
               </div>
               <div class="col-lg-12 mt-3">
                 <div class="card border-secondary wb-3" >
                   <div class="card-header">
                    DETAILS
                   </div>
                   <div class="card-body">
                     <h6>Description:
                       <span title="xtra large">{{$ad->description}}</span>
                     </h6>
                     <hr>
                     <h6>Location:
                       <span title="xtra large">{{$ad->location}}</span>
                     </h6>
                     <hr>
                     <h6>Name:
                       <span title="xtra large">{{$ad->productname}}</span>
                     </h6>
                     <hr>
                     <h6>Seller Name:
                       <span title="xtra large">{{$ad->sellername}}</span>
                     </h6>

                     <h6>Price:
                       <span title="xtra large">{{$ad->expsellprice}}</span>
                     </h6>
                     <h6>Contact Method:
                       <span title="xtra large">{{$ad->contactmethod}}</span>
                     </h6>
                     <hr>
                   </div>


                 </div>
               </div>
             </div>
            @endforeach
            @else
            <p>Not Found!</p>
            @endif
          @endif


        </div>
      </div>

    </div>
  </div>
</div>

@endsection
