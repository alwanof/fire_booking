<div class="row">

    @foreach($models as $model)
    <div class="col-md-3" >
      <a onclick="getServices({{$model->id}})" href="#" style="color:black;">
      <div class="card mb-4 bg-light box-shadow" style="border:0px; border-radius:25%">
        <div class="model_iamges">
          @if($model->video != null)
          <iframe id="video" height="218" width="327"  src="https://www.youtube.com/embed/{{$model->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          @endif
          @foreach($model->images as $image)
          <img class="card-img-top" style="border-radius:20px" data-src="{{$image->path}}" height="218" width="327" src="{{$image->path}}" alt="Card image cap">
          @endforeach


        </div>
        <div class="card-body">
          <p class="card-text title">
            {{$model->title}}

          </p>
          <p class="card-text description">

                                  {{Str::limit($model->bio, 100)}}
                                  <span class="collapse" id="model-{{$model->id}}">{{ $model->bio}}</span>
                                </span> <a data-toggle="collapse" data-target="#model-{{$model->id}}">More... &raquo;</a>
          </p>
          <div class="d-flex justify-content-between align-items-center">


          </div>
        </div>
      </div>
    </a>
    </div>

      @endforeach


</div>
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
