@extends('layouts.provider')

@section('style')
    <style>
        .checked {
            color: orange;
        }
    </style>
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <a class="btn btn-long btn-outline-dark " href="{{route('provider',$provider->username)}}" type="button"> <i
                    class="fa fa-arrow-circle-left"></i> Go Back </a>
        </div>
    </div>
    @foreach($services as $service)

        <div class="row">

            <div class="col-md-12" style="padding: 0px">

                <div class="card mb-4 bg-white box-shadow" style="border:0px;">

                    <div class="service_images">
                        @foreach($service->images as $image)
                            <img class="card-img-top" style="border-radius:0px" data-src="{{asset($image->path)}}"
                                 height="218" width="327" src="{{asset($image->path)}}" alt="Card image cap">
                        @endforeach

                    </div>
                    <div class="card-body">
                        <p class="card-text title">
                            {{$service->title}}
                        </p>
                        <p class="card-text description">
                            {{Str::limit($service->description, 100)}}
                            <span class="collapse" id="viewdetails{{$service->id}}">{{ $service->description}}</span>
                            </span>
                            <br>
                            <a data-toggle="collapse" data-target="#viewdetails{{$service->id}}"
                               style="color: #BE1622 ; font-weight: bold">{{__('Read More... >>')}}</a></p>
                        <div class="col-md-12">
                            <div class="row">
                                @if($service->discount_price  != 0 && $service->discount_price < $service->price)
                                    <p>
                                        <b style="	font-size: 1.5rem;	font-weight: bolder;">{{price_format($service->price,$service->id)}}
                                            </b> <span>/ {{__('Person')}}</span>
                                        <br>
                                        <b style="	font-size: 1.5rem;	font-weight: bolder;">
                                        {{__('Discount Price')}} : <span>{{$service->discount_price}}$</span>
                                    </b>
                                    </p>
                                @else
                                    <p><b style="	font-size: 1.5rem;	font-weight: bolder;">{{price_format($service->price,$service->id)}}</b> <span>/ {{__('Person')}}</span></p>
                                @endif

                            </div>
                            <div class="row">
                                @for($i=0; $i < $service->calc() ; $i++)
                                    <span class="fa fa-star checked"></span>
                                @endfor
                                @for($d=0; $d < (5 - $service->calc() ) ; $d++)
                                    <span class="fa fa-star"></span>
                                @endfor
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-6">
                                    <label for="">{{__('Persons Count')}}</label>
                                    <div class="input-group inline-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input class="form-control quantity" min="1" name="quantity" value="1"
                                               type="number">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="datep-{{$service->id}}">
                                    @if($service->serviceTimes->where('date', '>=', date('Y/m/d'))->groupBy('date')->count() != 0 )
                                        <div class="col-xs-12" style="margin-top:2rem">
                                            <label for="">{{__("Available Dates")}} :</label>
                                            <div style="width:100%;  overflow:hidden;" id="tarihSelector"
                                                 class="add_height">
                                                <div style="display:flex; overflow-x: scroll; padding-bottom:5px;"
                                                     id="pills_holder">
                                                    @foreach($service->serviceTimes->where('date', '>=', date('Y/m/d'))->groupBy('date') as $date)
                                                        <button type="button" class="btn btn-outline-dark"
                                                                onclick="getTimes({{$service->id}},this),selectDate({{strtotime($date[0]->date)}})"
                                                                data-id="{{strtotime($date[0]->date)}}"
                                                                style="float:left; margin-left:10px;">{{$date[0]->date}}</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <span style="height:10px; display:block;">&nbsp;</span>
                                            <input type="hidden" name="date" id="date" style="display:none;" readonly=""
                                                   class="hasDatepicker">
                                        </div>
                                    @else
                                        <br>
                                        <p>{{__('No Available Dates ')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div id="timep-{{$service->id}}">
                                </div>
                            </div>
                            <div class="row" id="confirm_{{$service->id}}" style="display: none;">
                                <div class="col-md-12">
                                    <form action="{{route('reservation_form',$provider->username)}}" method="POST">
                                        @csrf
                                        <input type="hidden" class="hidden" id="time_i" name="time">
                                        <input type="hidden" class="hidden" value="{{$service->id}}" name="service">
                                        <input type="hidden" class="hidden" id="date_i" name="date">
                                        <button class="btn btn-danger form-control">{{__('Book Now')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach


@endsection
@section('script')
    <script>
        $('.service_images').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {

                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {

                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        height: 218,
                        width: 327
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        $('.btn-plus, .btn-minus').on('click', function (e) {
            const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
            const input = $(e.target).closest('.input-group').find('input');
            if (input.is('input')) {
                input[0][isNegative ? 'stepDown' : 'stepUp']()
            }
        })
    </script>
@endsection
