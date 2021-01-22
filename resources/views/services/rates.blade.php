@extends('layouts.admin-lte')

@section('content')
    <style>
        .checked {
            color: orange;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('services.index')}}" class="btn btn-block btn-outline-dark">{{__('Back To Services')}}</a>
        </div>
    </div>
    <br>
    <div class="row">

        @foreach($rates as $rate)
            <div class="col-md-6">
                <div class="card card-outline card-primary">

                    <div class="card-header">


                    </div>

                    <div class="card-body">
                        @for($i=0; $i < $rate->rate ; $i++)
                            <span class="fa fa-star checked"></span>
                        @endfor
                        @for($d=0; $d < (5 - $rate->rate ) ; $d++)
                            <span class="fa fa-star"></span>
                        @endfor
                        <p class="card-text">{{$rate->note}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection
