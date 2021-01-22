@extends('layouts.v2')
@section('content')
  <div class="page-content-wrapper">
        <!-- Preloader-->

    <!-- Order/Payment Success-->
    <div class="order-success-wrapper bg-white">
      <div class="content"><i class="lni lni-checkmark-circle marker"></i>
        <h5>Congratulations!</h5>
        <p>Your request has been received.
            Confirmation mail will be sent to
            you as soon as possible.</p>

            <div class="content">
                <div class="card card-new border-success mt-4">

                    <div class="card-body">
                        <h5 class="card-title text-secondary float-left  p-0 mb-1 pb-1">Princes Islands (Public Tour)</h5>

                        <ul class="finish-list m-3 p-0">
                            <li> <p><i class="lni lni-users"></i> 2 person</p></li>
                            <li> <p><i class="lni lni-calendar"></i> 13 Dec 2020</p></li>
                            <li> <p><i class="lni lni-alarm-clock"></i> 09:00</p></li>

                        </ul>
                        <p class="  price-finish float-right" >Total Price: <strong>160$</strong></p>
                        <br>

                        <br>
                        <small class="float-right vat-price">(included VAT)</small>
                        <hr>

                        <p class="float-left sp-text">Language: <span>English</span> <br>
                            Special Request: <span> One of the passengers is
                                using a wheelchair.</span></p>

                    </div>
                    <a class="btn btn-primary mt-3" href="{{route('provider',$provider->username)}}">Back To Home</a>
                </div>
              </div>
      </div>

    </div>
  </div>
@endsection
