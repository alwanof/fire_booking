@extends('layouts.provider')
@section('style')


@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 style="font-weight: bolder;"> {{__('Discover All Our Special Offers')}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
            @foreach($categories as $category)
                <a type="button" href="{{route('ProviderCategory',[$provider->username,$category->id])}}"
                   class="btn btn-sm btn-outline-secondary m-1 categories_btn">{{$category->title}}</a>
            @endforeach
        </div>
    </div>
    <br>
    <div class="" id="step1">
        <div class="row ">
            <div class="col-md-12">
                @foreach($categories as $category)
                    <h3 style="font-weight: bolder;" class="">{{$category->title}}</h3>
                    <div class="model_iamges">
                        @foreach($category->Models as $model)


                            <div class="card mb-5  m-1" style="border:0px; margin-bottom: 10rem !important;">
                                <a href="{{route('ProviderServices',[$provider->username,$model->id])}}"
                                   style="color:black;">
                                    <div class="images">
                                        @if($model->video != null)
                                            <iframe id="video" height="218" width="327"
                                                    src="https://www.youtube.com/embed/{{$model->video}}"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        @endif
                                        @foreach($model->images as $image)
                                            <img class="card-img-top model-image"
                                                 data-src="{{asset($image->path)}}"
                                                 src="{{asset($image->path)}}" alt="Card image cap">
                                        @endforeach


                                    </div>
                                    <div class="card-body model_body">
                                        <p class="card-text title">
                                            {{$model->title}}

                                        </p>
                                        <p class="card-text description">

                                            {{Str::limit($model->bio, 45 )}}
                                            <span class="collapse" id="model-{{$model->id}}">{{ $model->bio}}</span>
                                            <br>
                                            </span>

                                        </p>
                                        <a data-toggle="collapse" data-target="#model-{{$model->id}}"
                                           style="color:#BE1622;font-weight: bold;">{{__('Read More... >>')}} </a>
                                        <div class="d-flex justify-content-between align-items-center">


                                        </div>
                                    </div>
                                </a>
                            </div>


                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="" id="step4" style="display:none;">
        <form class="form" action="{{route('customer.reservation',$username)}}" method="post">

            <h3 class="text-center">Contact Informations</h3>
            <p class="text-center" style="color:#666060;">Please insert your Personal information . Your Booking details
                will send to your inserted Email</p>
            <input type="hidden" name="service_id" id="service_id" value="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="First Name" aria-label="Username"
                       aria-describedby="basic-addon1">
            </div>
            <input type="hidden" name="date" id="date_i" value="">
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Username"
                       aria-describedby="basic-addon1">
            </div>
            <input type="hidden" name="time" id="time_i" value="">
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
    </div>

@endsection
