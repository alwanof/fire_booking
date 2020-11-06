

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('css/form-validation.css')}}" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>Checkout form</h2>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit,Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Summary</span>

      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Category</h6>
            <small class="text-muted" id="category_name"></small>
          </div>

        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Model</h6>
            <small class="text-muted" id="model_name"></small>
          </div>

        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Service</h6>
            <small class="text-muted" id="service_name"></small>
          </div>

        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Date / Time</h6>
            <small class="text-muted" id="Date_label"></small>
            <small class="text-muted" id="Time_label"></small>
          </div>

        </li>

        <li class="list-group-item d-flex justify-content-between">
          <span>Price (USD)</span>
          <strong id="price">$20</strong>
        </li>
      </ul>



    </div>
    @yield('content')

  </div>


</div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

      @yield('script')
      </body>
</html>
