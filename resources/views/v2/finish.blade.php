@extends('layouts.v2')
@section('content')
  <div class="page-content-wrapper">
        <!-- Preloader-->

    <!-- Order/Payment Success-->
    <div class="order-success-wrapper bg-white">
      <div class="content"><i class="lni lni-checkmark-circle marker"></i>
        <h5>{{__('Congratulations!')}}</h5>
        <p>{{__('Your request has been received.
            Confirmation mail will be sent to
            you as soon as possible.')}}</p>

            <div class="content">
                <div class="card card-new border-success mt-4">

                    <div class="card-body">
                        <h5 class="card-title text-secondary float-left  p-0 mb-1 pb-1">{{$service->UserModel->title}} ({{$service->title}})</h5>

                        <ul class="finish-list m-3 p-0">
                            <li> <p><i class="lni lni-users"></i> {{$booking->quantity}} {{__('Person')}}</p></li>
                            <li> <p><i class="lni lni-calendar"></i> {{mb_split(' ',$booking->ends_at)[0]}}</p></li>
                            <li> <p><i class="lni lni-alarm-clock"></i> {{mb_split(' ',$booking->ends_at)[1]}}</p></li>

                        </ul>
                        <p class="  price-finish float-right" >{{__('Total Price')}}: <strong>{{$booking->price}}</strong></p>
                        <br>

                        <br>
                        <small class="float-right vat-price">{{__('(included VAT)')}}</small>
                        <hr>

                        <p class="float-left sp-text">
                              @if($booking->asi != null )
                            @foreach(json_decode($booking->asi) as $key => $value)
                            {{$key}}: <span>{{$value}}</span> <br>
                            @endforeach
                                                    @endif
                            {{__('Notes')}}: <span>{{$booking->notes}}</span></p>
                    </div>
                    <a class="btn btn-primary mt-3" href="{{route('provider',$provider->username)}}">{{__('Back To Home')}}</a>
                </div>
              </div>
      </div>

    </div>
  </div>
@endsection
