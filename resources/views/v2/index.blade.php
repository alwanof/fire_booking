@extends('layouts.v2')
@section('content')

    <!-- PWA Install Alert-->
    <div class="toast pwa-install-alert shadow" id="pwaInstallToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="8000" data-autohide="true">
      <div class="toast-body">
        <button class="ml-3 close" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="content d-flex align-items-center mb-2"><img src="img/icons/icon-72x72.png" alt="">
          <h6 class="mb-0 text-white">Add to Home Screen</h6>
        </div><span class="mb-0 d-block text-white">Add Suha on your mobile home screen. Click the<strong class="mx-1">"Add to Home Screen"</strong>button & enjoy it like a regular app.</span>
      </div>
    </div>
    <div class="page-content-wrapper">


        @if($provider->Services->where('is_hot_deal',true)->first())

      <!-- Cool Facts Area-->
       
      <div class="cta-area ">
        <div class="container">
          <div class="cta-text p-4 p-lg-5" style="background-image: url({{asset($provider->Services->where('is_hot_deal',true)->first()->Images->first()->path)}})">
            <h4>{{$provider->Services->where('is_hot_deal',true)->first()->title }}</h4>
            <p>(Every morning at 9:00)  <small>Special Offer: 45$ /per person</small></p>
          </div>
        </div>
      </div>
      @endif
      <!-- Weekly Best Sellers-->
      <div class="weekly-best-seller-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="pl-1">Categoreis</h6>
{{--              <a class="btn btn-success btn-sm" href="shop-list.html">View All</a>--}}
          </div>
          <div class="row g-3">
            @foreach($categories as $category)
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side">
                    <span class="badge"><div class="product-rating">
                      <i class="lni lni-star-filled" style="color:#FDB526"></i> 4.88 (39)</div></span>
                      <a class="product-thumbnail d-block" href="{{route('ProviderCategory',[$provider->username,$category->id])}}">
                        <img src="{{asset($category->Images->first()->path)}}" alt=""></a>
                      </div>
                  <div class="product-description">
                    <a class="product-title d-block" href="{{route('ProviderCategory',[$provider->username,$category->id])}}">{{$category->title}}</a>
                    <p class="mb-0">{{Str::limit($category->description, 60 )}}</p>
                      <ul class="card-list">
                          @foreach(json_decode($category->description_list) as $description_list)
                        <li><i class="lni lni-checkmark"></i> {{$description_list}}</li>
                          @endforeach
                       </ul>
{{--                    <p class="sale-price"><sub> from </sub> {{price_format_front(min(getPrices($category->Models)),$provider)}} / {{max(getPrices($category->Models))}} </p>--}}


                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Night Mode View Card-->
      <div class="night-mode-view-card pb-3">
        <div class="container">
          <div class="card settings-card">
            <div class="card-body">
              <div class="single-settings d-flex align-items-center justify-content-between">
                <div class="title"><i class="lni lni-night"></i><span>Night Mode</span></div>
                <div class="data-content">
                  <div class="toggle-button-cover">
                    <div class="button r">
                      <input class="checkbox" id="darkSwitch" type="checkbox">
                      <div class="knobs"></div>
                      <div class="layer"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
@endsection
