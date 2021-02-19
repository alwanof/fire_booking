@extends('layouts.v2')
@section('content')

    <div class="page-content-wrapper">




      <!-- Weekly Best Sellers-->
      <div class="weekly-best-seller-area py-3">
        <div class="container">
            <form action="{{route('customer_front.reservation_cancel_process',$provider->username)}}" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                <input type="hidden" name="booking_id" value="{{$booking->id}}">
    @if($cancel_policy != null)

          <div class="row g-6">

            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                  <h5 class="card-title">{{__('Reservation Cancellation Policy')}}</h5>
                <div class="card-body d-flex align-items-center">

                  <div class="product-description" style="flex: 0 0 100%;max-width: 100%;width: 100%">
                    <p class="mb-0">{{$cancel_policy->description}}</p>
                      <br>
                    <p>
                        <label for="">
                           <input type="checkbox" required class="checkbox"> Are you Accept?

                        </label>
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </div>
                <br>
            @endif

            <div class="row g-6">

            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                  <h5 class="card-title">{{__('Reservation Cancellation ')}}</h5>
                <div class="card-body d-flex align-items-center">

                  <div class="product-description" style="flex: 0 0 100%;max-width: 100%;width: 100%">
                    <p class="mb-0">From this page you can check your reservation , edit , cancel it </p>
                      <br>
                      <div class="form-group">
                          <label for="">Note</label>

                      <textarea name="notes" id="" required class="form-control" cols="30" rows="5"></textarea>
                      </div>
                      <br>
                    <button class="btn btn-success form-control" type="submit"> Cancel </button>
                  </div>
                </div>
              </div>
            </div>

          </div>
                <br>
</form>
        </div>
      </div>


    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
@endsection
