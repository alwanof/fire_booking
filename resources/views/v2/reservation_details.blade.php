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
                      <br>
                      <div class="row">
                          <div class="col-md-6">
                              <form action="{{route('customer_front.reservation_cancel',$provider->username)}}">
                                  <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                  <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                <button class="btn btn-danger" type="submit"> <i class="lni lni-ban"></i> Cancel </button>
                             </form>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-4">
                              <p>Reservation Date : {{$booking->ends_at}}</p>
                              <br>
                              <p>Booked Service : {{$booking->bookable_type::find($booking->bookable_id)->title}}</p>
                          </div>
                          <div class="col-md-4">
                              <p>Provider Name : {{\App\User::find($booking->user_id)->name}}</p>
                              <br>
                              <p>Provider Contact : {{\App\User::find($booking->user_id)->email}}</p>
                          </div>
                          <div class="col-md-4">
                              <p>Person Count : {{$booking->quantity}}</p>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
                <br>
            <div class="row g-6">
                <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                  <h5 class="card-title">{{__('Notes')}}</h5>
                <div class="card-body d-flex align-items-center">

                  <div class="product-description" style="flex: 0 0 100%;max-width: 100%;width: 100%">
                    <p class="mb-0">{{$booking->notes}} </p>

                  </div>
                </div>
              </div>
            </div>
            </div>
            <br>
            @if($booking->guests != '')
            <div class="row g-6">
                <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                  <h5 class="card-title">{{__('Persons Inforamtions')}}</h5>
                <div class="card-body d-flex align-items-center">

                  <div class="product-description" style="flex: 0 0 100%;max-width: 100%;width: 100%">
                        <div class="row">

                        @php($i = 0)
                      @foreach(json_decode($booking->guests) as $person)
                          @php($i++)
                          <div class="col-md-6">

                            <legend>Person {{$i}}</legend>
                              <hr>
                          @foreach($person as $key => $value)
                              <p>{{$key}} : {{$value}}</p><br>
                          @endforeach
                                 </div>
                      @endforeach
                             </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

            @endif
            @if($booking->asi != '')
            <br>
            <div class="row g-6">
                <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                  <h5 class="card-title">{{__('Additional Informations')}}</h5>
                <div class="card-body d-flex align-items-center">

                  <div class="product-description" style="flex: 0 0 100%;max-width: 100%;width: 100%">
                      @foreach(json_decode($booking->asi) as $Key => $value)
                    <p class="mb-0">{{$Key}} : {{$value}} </p>
                      @endforeach
                  </div>
                </div>
              </div>
            </div>
            </div>
                @endif

        </div>
      </div>


    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
@endsection
