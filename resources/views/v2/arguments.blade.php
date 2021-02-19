@extends('layouts.v2')
@section('content')

    <div class="page-content-wrapper">




      <!-- Weekly Best Sellers-->
      <div class="weekly-best-seller-area py-3">
        <div class="container">

        <hr>
            @foreach($arguments as $argument)
          <div class="row g-6">

            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                  <h5 class="card-title">{{$argument->title}}</h5>
                <div class="card-body d-flex align-items-center">

                  <div class="product-description" style="flex: 0 0 100%;max-width: 100%;width: 100%">
                    <p class="mb-0">{{$argument->description}}</p>

                  </div>
                </div>
              </div>
            </div>

          </div>
                <br>
                 @endforeach
        </div>
      </div>


    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
@endsection
