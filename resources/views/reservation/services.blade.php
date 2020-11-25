
<div class="row">

    @foreach($services as $service)
    <div class="col-md-3" style="padding: 0px">

      <div class="card mb-4 bg-light box-shadow" style="border:0px;">

        <div class="service_images">
          @foreach($service->images as $image)
          <img class="card-img-top" style="border-radius:0px" data-src="{{asset($image->path)}}" height="218" width="327" src="{{asset($image->path)}}" alt="Card image cap">
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
              <a data-toggle="collapse" data-target="#viewdetails{{$service->id}}" style="color: #BE1622 ; font-weight: bold">{{__('Read More... >>')}}</a></p>
          <div class="col-md-12">
            <div class="row">

                    @if($service->discount_price  != 0 && $service->discount_price < $service->price)



                    <p>
                         <b style="	font-size: 1.5rem;	font-weight: bolder;">{{$service->price}}$</b> <span>/ {{__('Person')}}</span>
                        <br>
                        {{__('Discount Price')}} : <span>{{$service->discount_price}}$</span> </p>
                @else
                    <p>    <b style="	font-size: 1.5rem;	font-weight: bolder;">{{$service->price}}$</b> <span>/ {{__('Person')}}</span> </p>

                @endif

            </div>
            <div class="row">
              <div id="datep-{{$service->id}}">

                <div class="col-xs-12" style="margin-top:2rem">
                  <label for="">{{__("Available Dates")}} :</label>
                <div style="width:350px;  overflow:hidden;" id="tarihSelector" class="add_height">
                <div style="display:flex; overflow-x: scroll; padding-bottom:5px;" id="pills_holder">

                  @foreach($service->serviceTimes->groupBy('date') as $date)
                <button type="button" class="btn btn-outline-dark" onclick="getTimes({{$service->id}},this),selectDate({{strtotime($date[0]->date)}})" data-id="{{strtotime($date[0]->date)}}" style="float:left; margin-left:10px;">{{$date[0]->date}}</button>
                @endforeach

                 </div>
                </div>
                <span style="height:10px; display:block;">&nbsp;</span>
                <input type="hidden" name="date" id="date" style="display:none;" readonly="" class="hasDatepicker" >
                </div>
              </div>
            </div>
            <div class="row">
              <div id="timep-{{$service->id}}">

              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

      @endforeach


</div>

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
          height:218,
          width:327
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
    });

</script>
