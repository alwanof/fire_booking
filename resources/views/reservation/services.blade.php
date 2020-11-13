
<div class="row">

    @foreach($services as $service)
    <div class="col-md-3" >
      <a  href="#" style="color:black;">
      <div class="card mb-4 bg-light box-shadow" style="border:0px; border-radius:25%">
        <div class="service_images">
          @foreach($service->images as $image)
          <img class="card-img-top" style="border-radius:20px" data-src="{{$image->path}}" height="218" width="327" src="{{$image->path}}" alt="Card image cap">
          @endforeach

        </div>
        <div class="card-body">
          <p class="card-text title">
            {{$service->title}}

          </p>
          <p class="card-text description">

                                  {{Str::limit($service->description, 100)}}
                                  <span class="collapse" id="viewdetails{{$service->id}}">{{ $service->description}}</span>
                                </span> <a data-toggle="collapse" data-target="#viewdetails{{$service->id}}">More... &raquo;</a></p>
          <div class="col-md-12">
            <div class="row">
              <p>Price : <span>{{$service->price}}$</span> </p>
            </div>
            <div class="row">
              <div id="datep-{{$service->id}}">

                <div class="col-xs-12" style="margin-top:2rem">
                  <label for="">{{__("Available Dates")}} :</label>
                <div style="width:350px;  overflow:hidden;" id="tarihSelector" class="add_height">
                <div style="display:flex; overflow-x: scroll; padding-bottom:5px;" id="pills_holder">

                  @foreach($service->serviceTimes->groupBy('date') as $date)
                <button type="button" class="btn btn-success" onclick="getTimes({{$service->id}},this),selectDate({{strtotime($date[0]->date)}})" data-id="{{strtotime($date[0]->date)}}" style="float:left; margin-left:10px;">{{$date[0]->date}}</button>
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
    </a>
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
