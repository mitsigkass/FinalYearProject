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
          <strong>All Advertisements</strong>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="card-deck">
            @if(count($ads)>0)
            @foreach($ads as $row)
            <div class="row">
              <div class="col mr-1 mt-3 pb-3">
                <div class="card" style="width: 15rem;">
                  <img src=<?php echo strtok($row->photos, ',')?> style="width:auto;height:182px;">
                  <h3 style="magrin-bottom: 0px;">{{$row->productname}}</h3>
                  <p class="card-text" style="magrin-bottom: 0px;">{{$row->expsellprice}}</p>
                  <p class="card-text" style="magrin-bottom: 0px;">{{$row->sellername}}</p>
                  <p><a href='{{url("/product/view/{$row->id}")}}'>VIEW</a></p>
              </div>
            </div>
            </div>
            @endforeach
            @else
  <div class="col-md-3">

    </div>
            @endif

          </div>
  </div>

        </div>
      </div>

    </div>
  </div>
</div>

@endsection
