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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <!-- <link href="album.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
    <style media="screen">
        .card-body {

            border-bottom: 1px solid #d0cece;
        }

        body {
            font-family: 'Didact Gothic', sans-serif, Circular, -apple-system, BlinkMacSystemFont, Roboto, Helvetica Neue, sans-serif;
        }

        @media (max-width: 480px) {
            .slick-slide {
                height: 218px;
                width: 327px;
            }

            .slick-slide img {
                height: 218px;
                width: 327px;
            }
        }

        .slick-dots {
            bottom: 0px;
        }

        .slick-dots li.slick-active button:before {
            color: white !important;
        }

        .steps li {
            display: inline;
            padding: 15px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;

        }

        .steps li > a {
            color: black;
        }

        .steps li.active {
            background: #343a40;
            border-bottom: 2px solid white;
            color: white;
        }

        .steps li.active > a {
            color: white;
        }

        .slick-dotted.slick-slider {
            margin-bottom: 5px;
        }

        .title {
            font-weight: 800 !important;
            word-break: break-all !important;
            font-size: 25px !important;
            line-height: 25px !important;
            margin-bottom: 5px
        }

        .description {
            font-size: 15px !important;
            color: #595959
        }

    </style>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css"
          integrity="sha512-UyNhw5RNpQaCai2EdC+Js0QL4RlVmiq41DkmCJsRV3ZxipG2L0HhTqIf/H9Hp8ez2EnFlkBnjRGJU2stW3Lj+w=="
          crossorigin="anonymous"/>
</head>

<body class="bg-light">


<main role="main">

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="" id="step1">
                <div class="row ">

                    <div class="col-md-12">
                        <a href="#" style="color:black;">
                            <div class="card mb-4 bg-light box-shadow" style="border:0px; border-radius:25%">
                                <div class="text-center align-items-center">


                                    <img src="https://media.tenor.com/images/cbae2dfd31aa5ec2fcb7f46b65e1550f/tenor.gif"
                                         width="50%" class=" rounded-circle" alt="">
                                    <!-- <img src="https://images.vexels.com/media/users/3/157931/isolated/preview/604a0cadf94914c7ee6c6e552e9b4487-curved-check-mark-circle-icon-by-vexels.png" width="50%" class=" rounded-circle" alt=""> -->
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-center title">
                                        Thank You {{$name}}

                                    </p>
                                    <p class="card-text text-center description">

                                        Thanks For Using our System Your <br>
                                        Booking key : {{$key}}
                                        <br>
                                        Your Booking details will Send to Your Email : {{$email}}
                                        please check Your Email
                                    </p>


                                </div>
                            </div>
                        </a>
                    </div>

                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>
</html>
