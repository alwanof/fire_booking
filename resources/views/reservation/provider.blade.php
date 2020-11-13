<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Album example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <!-- <link href="album.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
    <style media="screen">
    .card-body {

	border-bottom: 1px solid #d0cece;
}
      body{    font-family: 'Didact Gothic', sans-serif,Circular, -apple-system, BlinkMacSystemFont, Roboto, Helvetica Neue, sans-serif;}
      @media (max-width:480px) {
        .slick-slide {
     height:218px;
     width: 327px;
  }

  .slick-slide img {
     height:218px;
     width: 327px;
  }
      }
      .slick-dots {
  bottom:  0px;
}
.slick-dots li.slick-active button:before {
    color:white !important;
}
      .steps li {
        display: inline;
        padding: 15px;
        border-bottom-left-radius:  20px;
        border-bottom-right-radius:  20px;

      }
      .steps li > a{
        color: black;
      }
      .steps li.active{
        background: #343a40;
        border-bottom: 2px solid white;
        color: white;
      }
      .steps li.active > a{
        color: white;
      }

      .slick-dotted.slick-slider {
      	margin-bottom: 5px;
      }
      .title{
        font-weight: 800 !important;word-break: break-all !important;
font-size: 25px !important;
line-height: 25px !important;
margin-bottom:5px
      }
      .description{
        font-size: 15px !important; color:#595959
      }

    </style>
  </head>

  <body class="bg-light">
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar   navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">

          <a href="#" class="navbar-brand d-flex align-items-center">
            <img class=""  src="{{$provider->avatar}}" alt="{{$provider->name}}" width="40" height="40">
            <strong style="margin-left:5px">  {{$provider->name}}</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>


        <div class=" container d-flex justify-content-between" style="/*! margin-top: 5px; */background: #f8f9fa;/*! padding: 1px; *//*! padding-bottom: 0.3rem; */ ">
          <ul class="steps float-right" style="margin-bottom: 1rem;padding:0;">
            <li id="nav_step1" class="active"><a  onclick="goToStep('step1')" href="#">Categories</a> </li>
            <li id="nav_step2"><a  onclick="goToStep('step2')" href="#">Items</a> </li>
            <li id="nav_step3"><a  onclick="goToStep('step3')" href="#">Services</a> </li>
            <li id="nav_step4"><a  onclick="goToStep('step4')" href="#">Finish</a> </li>
          </ul>

        </div>




    <main role="main">

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="" id="step1">
            <div class="row " >
              @foreach($categories as $category)
              <div class="col-md-3" >
                <div class="card mb-4 bg-light box-shadow" style="border:0px; border-radius:25%">
                  <div class="images">
                    @if($category->video != null)
                    <iframe id="video" height="218" width="327"  src="https://www.youtube.com/embed/{{$category->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                    @foreach($category->images as $image)
                    <img class="card-img-top" style="border-radius:20px" data-src="{{$image->path}}" height="218" width="327" src="{{$image->path}}" alt="Card image cap">
                    @endforeach
                  </div>
                  <a onclick="getModels({{$category->id}})" href="#" style="color:black;">
                  <div class="card-body">
                    <p class="card-text title">
                      {{$category->title}}

                    </p>
                    <p class="card-text description" >

                      {{Str::limit($category->description, 100)}}
                      <span class="collapse" id="viewdetails3">{{ $category->description}}</span>
                      </span> <a data-toggle="collapse" data-target="#viewdetails3">More... &raquo;</a>
                    </p>

                    <div class="d-flex justify-content-between align-items-center">


                    </div>
                  </div>
                </a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="" id="step2">

          </div>
          <div class="" id="step3">

          </div>
          <div class="" id="step4" style="display:none;">
            <form class="form" action="{{route('customer.reservation',$username)}}" method="post">

              <h3 class="text-center">Contact Informations</h3>
              <p class="text-center" style="color:#666060;">Please insert your Personal information . Your Booking details will send to your inserted Email</p>
              <input type="hidden" name="service_id" id="service_id" value="">
              <div class="input-group mb-3">
                  <input type="text" class="form-control" name="name" placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <input type="hidden" name="date" id="date_i" value="">
              <div class="input-group mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <input type="hidden" name="time" id="time_i" value="">
              <div class="input-group mb-3">
                  <input type="text" class="form-control" name="phone" placeholder="phone" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                  <button type="submit" class="form-control btn btn-outline-primary" name="button">Submit</button>
              </div>
              <input type="hidden" name="user_id" value="{{$provider->id}}">






              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
          </div>
          <div class="" id="step5">

          </div>

        </div>
      </div>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- <script src="../../assets/js/vendor/holder.min.js"></script> -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>

  $('.images').slick({

      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
       autoplaySpeed: 10000,
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
      $(function(){
                var id = 2;
            $(document).on('beforeChange','.images',function(event, slick, currentSlide, nextSlide){
              var current = $(slick.$slides[currentSlide]);
              $("#video").attr('src', $('#video').attr('src'));
            })
          })
      // $('.images').on('beforeChange', function(event, slick, currentSlide, nextSlide){
      //   var current = $(slick.$slides[currentSlide]);
      //   $("#video").attr('src', $('#video').attr('src'));
      // });
    </script>

    <script>
      function goToStep(id) {
        console.log(id);
        switch (id) {
          case 'step1':
          $("#step1").show();
          $("#step2").hide();
          $("#step3").hide();
          $("#step4").hide();
            $("#step5").hide();
            break;
            case "step2":
            $("#step2").show();
            $("#step1").hide();
            $("#step3").hide();
            $("#step4").hide();
              $("#step5").hide();

              break;
              case "step3":
              $("#step3").show();
              $("#step2").hide();
              $("#step1").hide();
              $("#step4").hide();
                $("#step5").hide();

                break;
                case "step4":
                $("#step4").show();
                $("#step2").hide();
                $("#step3").hide();
                $("#step1").hide();
                  $("#step5").hide();

                  break;
                  case "step5":
                  $("step5").show();
                  $("step2").hide();
                  $("step3").hide();
                  $("step4").hide();
                    $("step1").hide();

                    break;
          default:

        }
      }
      function getModels(id) {
        console.log(id);
        $.ajax({
          url:"/index.php/services/getModels/"+id,
          type:"GET",
          success:function(data){
            $("#step1").fadeOut("slow",function(){
              goToStep("step2");
              $("#step2").html(data);
              $("#nav_step1").toggleClass( "active" );
              $("#nav_step2").toggleClass( "active" );
            });
          }
        });

      }
      function selectTime(time) {
        $("#time_i").val(time);
        $("#nav_step3").toggleClass( "active" );
        $("#nav_step4").toggleClass( "active" );
        goToStep("step4");
        console.log(time);

      }
      function selectDate(date) {
        $("#date_i").val(date);
        console.log(date);
      }
      function toggle() {

      $("#selectedModel").toggle();
      $("#modelHolder").toggle();
      $("#selectedService").toggle();
      $("#servicesHolder").toggle();
    }
      function getDates(id) {

        $.ajax({
          url:"/index.php/services/getDates/"+id,
          type:"GET",


          success:function(data){

            $("#datep-"+id).html(data);

          },
          error:function(data){

            alert("Something Wrong !");
          }
        })

      }
      function getTimes(id,e) {
        $("#service_id").val(id);
        value = e.dataset.id;
        $("#Date_label").html(new Date(value*1000).toLocaleDateString('en-GB'));
        $("#date").val(value);
        $.ajax({
          url:"/index.php/services/getTimes/"+id+"/"+value,
          type:"GET",


          success:function(data){

            $("#timep-"+id).html(data);

            // $("#submitBtn").show();
          },
          error:function(data){

            alert("Something Wrong !");
          }
        })

      }
      function getServices(id) {


        $.ajax({
          url:"/index.php/models/getServices/"+id,
          type:"GET",


          success:function(data){

          // text = $( "#models option:selected").text() ;
          // $("#model_name").html(text);
            // $("#selectedModel").html(text );
            // $("#selectedModel").show();
            // $("#modelHolder").hide();\
            $("#step2").fadeOut("slow",function(){
              goToStep("step3");

              $("#step3").html(data);

              $("#nav_step2").toggleClass( "active" );
              $("#nav_step3").toggleClass( "active" );
            });
            // $("#servicesHolder").html(data);
            // $("#next").click();

          },
          error:function(data){

            alert("Something Wrong !");
          }
        })

      }
    </script>
  </body>
</html>
