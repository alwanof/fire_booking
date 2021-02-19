@extends('layouts.v2')
@section('content')

    <div class="page-content-wrapper">




      <!-- Weekly Best Sellers-->
      <div class="weekly-best-seller-area py-3">
        <div class="container">



          <div class="row g-6">

            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                  <h5 class="card-title">{{__('Customer Settings Page')}}</h5>
                <div class="card-body d-flex align-items-center">

                  <div class="product-description" style="flex: 0 0 100%;max-width: 100%;width: 100%">
                    <p class="mb-0">From this page you can check your reservation , edit , canecel it </p>
                      <hr>
                      <form action="{{route('customer_front.reservation',$provider->username)}}" method="GET">
                          <div class="form-group">
                              <label for="">Booking Key</label>
                              <input type="text" class="form-control" name="booking_key" required>
                          </div>
                          <div class="form-group">
                              <label for="">Email <small>  ( Please Enter the used email while making reservation) </small> </label>
                              <input type="email" class="form-control" name="email" required>
                          </div>
                          <br>
                          <div class="form-group">
                              <button class="btn btn-success form-control">Check it !</button>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
                <br>

        </div>
      </div>


    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
@endsection
