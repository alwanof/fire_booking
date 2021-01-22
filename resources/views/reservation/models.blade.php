@extends('layouts.provider')
@section('style')
    <style>

        .slick-list {
            border-radius: 25px;
        }

        .rounded-btn {
            border-radius: 15px;
        }

        .btn-long {
            width: 40%;
        }

        .sticky {
            position: sticky;
            position: -webkit-sticky;
            display: flex;
        }

        .diver {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
        }

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
    @foreach($models as $model)
        @php
            $services_prices = array();

            $services = $model->Services;
            foreach ($services as $service){
                if ( $service->price != 0){
                   $services_prices[] = $service->price;

                }
            }


            $services_rate = array();

            foreach ($services as $service){
                if ( $service->calc() != 0){
                   $services_rate[] = $service->calc();

                }
            }

           if(!empty($services_rate )){
                        $rates = range(max($services_rate),min($services_rate));
        $average = array_sum($rates) / count($rates);
           }else{
               $average = 0;
           }

        @endphp
        <div class="row">
            <div class="col-md-12" style="padding: 14px">
                <a href="#" style="color:black;">
                    <div class="card mb-4 bg-white box-shadow" style="border:0px; ">
                        <div class="model_iamges">
                            @if($model->video != null)
                                <iframe id="video" height="218" width="327"
                                        src="https://www.youtube.com/embed/{{$model->video}}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            @endif
                            @foreach($model->images as $image)
                                <img class="card-img-top"
                                     data-src="{{asset($image->path)}}"
                                     height="218" width="327" src="{{asset($image->path)}}" alt="Card image cap">
                            @endforeach


                        </div>
                        <div class="card-body">
                            <p class="card-text title">
                                {{$model->title}}

                            </p>
                            @if(!empty($services_prices))
                                <p>{{__('Price Range')}} : {{min($services_prices)}} - {{max($services_prices)}} $</p>
                            @endif
                            <p>
                            {{__('Services Count')}} : {{$model->Services->count()}}
                            </p>
                            <p class="card-text description">

                                {{Str::limit($model->bio, 100)}}
                                <span class="collapse" id="model-{{$model->id}}">{{ $model->bio}}</span>
                                <br>
                                </span> <a data-toggle="collapse" data-target="#model-{{$model->id}}"
                                           style="color:#BE1622;font-weight: bold;">{{__('Read More... >>')}} </a>
                            </p>

                            <div class="float-left">
                                @for($i=0; $i < $average ; $i++)
                                    <span class="fa fa-star checked"></span>
                                @endfor
                                @for($d=0; $d < (5 - $average ) ; $d++)
                                    <span class="fa fa-star"></span>
                                @endfor
                            </div>
                            <div class="d-flex justify-content-between align-items-center float-right">

                                <a href="{{route('ProviderServices',[$provider->username,$model->id])}}"
                                   class="btn btn-danger  rounded-btn" type="button">Discover</a>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    @endforeach


@endsection
@section('script')
    <script>
        $('.model_iamges').slick({

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

    </script>
@endsection
