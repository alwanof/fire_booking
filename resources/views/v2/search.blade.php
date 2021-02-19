@extends('layouts.v2')
@section('content')

    <div class="page-content-wrapper">




      <!-- Weekly Best Sellers-->
      <div class="weekly-best-seller-area py-3">
        <div class="container">
          <div class="section-heading sp-header d-flex align-items-center justify-content-between">
            <h6 class="pl-1">Searched Keyword : {{$request->q}} </h6><span href="#"> {{count($services)}} results view</span>
            <div class="suha-navbar-toggler d-flex flex-wrap" id="">
                <span></span>
                <span></span>
                <span></span>
            </div>
          </div>
        <hr>
            <div class="row g-3">

                    <div class="d-flex align-items-center justify-content-around">
                    <ul style="padding-left: 0">
                    <li><a href="{{url()->current()}}?q={{$request->q}}&order=1">Sort By A - Z</a></li>
                    <li><a href="{{url()->current()}}?q={{$request->q}}&order=2">Sort By Z - A</a></li>
                </ul>
                     <ul style="padding-left: 0">
                    <li><a href="{{url()->current()}}?q={{$request->q}}&order=3">Sort By Newest</a></li>
                    <li><a href="{{url()->current()}}?q={{$request->q}}&order=4">Sort By Oldest</a></li>
                </ul>

                </div>
            </div>
            <br>
          <div class="row g-3">
            @foreach($services as $service)
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                  <h5 class="card-title">{{$service->title}}</h5>
                <div class="card-body d-flex align-items-center">
                    <div class="product-thumbnail-side">
                        <span class="badge"><div class="product-rating">
                            <i class="lni lni-star-filled" style="color:#FDB526"></i> </div></span>
                      <a class="product-thumbnail d-block" href="#">
                          @if(isset($service->Images->first()->path))
                        <img src="{{asset($service->Images->first()->path)}}" alt="">
                        @endif
                        </a>
                      </div>
                  <div class="product-description">
                    <p class="mb-0">{{Str::limit($service->description, 60 )}}</p>
                      <form action="{{route('ProviderServices',['username'=>$provider->username,'model'=>$service->UserModel->id])}}">
                          <input type="hidden" name="service" value="{{$service->id}}">
                          <button class="btn btn-success btn-sm add2cart-notify form-control sp-btn" href="#">Book Now</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>

                @endforeach
          </div>
        </div>
      </div>


    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
@endsection
