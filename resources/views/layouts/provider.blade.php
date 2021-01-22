<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="{{config('app.name')}}">
    <title>{{config('app.name')}} | {{$provider->name}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('provider.css')}}">
    @yield('style')
</head>
<body>
<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other
                        background context. Make it a few sentences long so folks can pick up some informative tidbits.
                        Then, link them off to some social networking sites or contact information.</p>
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
    <div class="navbar  box-shadow" style="border-bottom: 1px solid #f0eeee">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <img class="provider-img" src="{{asset($provider->avatar)}}" alt="{{$provider->name}}" width="80"
                     height="44">
                <p style="margin-left:5px;color: #959595;font-size: 15px;margin-top: 1px;">
                    <b style="color: black">{{$provider->name}}</b>
                    <br>
                    {{$provider->email}}
                </p>
            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
        </div>
    </div>
</header>
<main role="main">
    <div class="album py-3 ">
        <div class="container">
            @yield('content')
        </div>
    </div>
</main>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('js/js_slider.js')}}"></script>
@yield('script')
<script>
    $(".models_slider").diyslider(); // this is all you need!
    $('.model_iamges').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {

                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {

                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    height: 500,
                    width: 327
                }
            }

        ]
    });
    $('.images').slick({
        dots: true,
        infinite: true,
        speed: 300, arrows: false,

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
                    height: 500,
                    width: 327
                }
            }
        ]
    });
    $(function () {
        var id = 2;
        $(document).on('beforeChange', '.images', function (event, slick, currentSlide, nextSlide) {
            var current = $(slick.$slides[currentSlide]);
            $("#video").attr('src', $('#video').attr('src'));
        })
    })
</script>

<script>
    function getModels(id) {
        console.log(id);
        $.ajax({
            url: "/services/getModels/" + id,
            type: "GET",
            success: function (data) {
                $("#step1").fadeOut("slow", function () {
                    goToStep("step2");
                    $("#step2").html(data);
                    $("#nav_step1").toggleClass("active");
                    $("#nav_step2").toggleClass("active");
                });
            }
        });
    }

    function selectTime(time, id) {
        $("#time_i").val(time);
        $("#confirm_" + id).show();
    }

    function selectDate(date) {
        $("#date_i").val(date);
    }

    function toggle() {
        $("#selectedModel").toggle();
        $("#modelHolder").toggle();
        $("#selectedService").toggle();
        $("#servicesHolder").toggle();
    }

    function getDates(id) {
        $.ajax({
            url: "/services/getDates/" + id,
            type: "GET",
            success: function (data) {
                $("#datep-" + id).html(data);
            },
            error: function (data) {
                alert("Something Wrong !");
            }
        })
    }

    function getTimes(id, e) {
        $("#service_id").val(id);
        value = e.dataset.id;
        $("#Date_label").html(new Date(value * 1000).toLocaleDateString('en-GB'));
        $("#date").val(value);
        $.ajax({
            url: "/services/getTimes/" + id + "/" + value,
            type: "GET",
            success: function (data) {
                $("#timep-" + id).html(data);
            },
            error: function (data) {
                alert("Something Wrong !");
            }
        })

    }

    function getServices(id) {
        $.ajax({
            url: "/models/getServices/" + id,
            type: "GET",
            success: function (data) {
                $("#step2").fadeOut("slow", function () {
                    goToStep("step3");

                    $("#step3").html(data);

                    $("#nav_step2").toggleClass("active");
                    $("#nav_step3").toggleClass("active");
                });
            },
            error: function (data) {
                alert("Something Wrong !");
            }
        })
    }
</script>
</body>
</html>
