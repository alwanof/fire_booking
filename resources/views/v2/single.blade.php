@extends('layouts.v2')
@section('content')

    <div class="page-content-wrapper">




      <!-- Weekly Best Sellers-->
      <div class="weekly-best-seller-area py-3">
        <div class="container">
          <div class="section-heading sp-header d-flex align-items-center justify-content-between">
            <h6 class="pl-1">{{$category->title}}</h6><span href="#">{{$models->count()}} results view</span>
        </div>
        <hr>
          <div class="row g-3">
              @foreach($models as $model)
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                  <h5 class="card-title">{{$model->title}}</h5>
                <div class="card-body d-flex align-items-center">
                    <div class="product-thumbnail-side">
                        <span class="badge"><div class="product-rating">
                            <i class="lni lni-star-filled" style="color:#FDB526"></i> 4.88 (39)</div></span>
                      <a class="product-thumbnail d-block" href="#">
                        <img src="{{asset($model->Images->first()->path)}}" alt=""></a>
                      </div>
                  <div class="product-description">
                    <p class="mb-0">{{Str::limit($model->bio, 60 )}}</p>
                      <form action="{{route('ProviderServices',['username'=>$provider->username,'model'=>$model->id])}}">
                        <ul class="card-list-checkbox">
                            @foreach($model->Services as $service)
                            <li > <input type="radio" name="service" value="{{$service->id}}" id="">{{$service->title}} -
                                {{price_format_front($service->price,$provider)}}
                                (for per person) </li>
                            @endforeach

                          </ul>
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
