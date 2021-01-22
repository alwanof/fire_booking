@extends('layouts.provider')
@section('style')

@endsection

@section('content')

   <form class="form" action="{{route('customer.reservation',$provider->username)}}" method="post">

            <h3 class="text-center">Contact Informations</h3>
            <p class="text-center" style="color:#666060;">Please insert your Personal information . Your Booking details
                will send to your inserted Email</p>
            <input type="hidden" name="service_id" id="service_id" value="{{$service}}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="First Name" aria-label="Username"
                       aria-describedby="basic-addon1">
            </div>
            <input type="hidden" name="date" id="date_i" value="{{$date}}">
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Username"
                       aria-describedby="basic-addon1">
            </div>
            <input type="hidden" name="time" id="time_i" value="{{$time}}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="phone" placeholder="phone" aria-label="Username"
                       aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="form-control btn btn-outline-primary" name="button">Submit</button>
            </div>
            <input type="hidden" name="user_id" value="{{$provider->id}}">


            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>


@endsection
@section('script')

@endsection
