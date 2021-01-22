<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Suha - Multipurpose Ecommerce Mobile HTML Template</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('/v2/img/icons/icon-72x72.png')}}">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="{{asset('/v2/img/icons/icon-96x96.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('/v2/img/icons/icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{asset('/v2/img/icons/icon-167x167.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/v2/img/icons/icon-180x180.png')}}">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="{{asset('/v2/style.css')}}">
    <link rel="stylesheet" href="{{asset('/v2/extra.css')}}">
    <!-- Web App Manifest-->
    <link rel="manifest" href="{{asset('/v2/manifest.json')}}">
      @yield('style')
  </head>

  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="{{route('provider',$provider->username)}}"><img src="{{asset('/v2/img/core-img/logo.png')}}" alt="">
            </a></div>
        <!-- Search Form-->
        <div class="top-search-form">
          <form action="" method="">
            <input class="form-control" type="search" placeholder="Enter your keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex flex-wrap"
             style="margin-right: 10px;margin-left: 10px;" >
            <i class="lni lni-sort-amount-asc"></i>
        </div>
        <div class="suha-navbar-toggler d-flex flex-wrap"
             style="margin-right: 10px;margin-left: 10px;" >
             <i class="lni lni-control-panel"></i>
        </div>
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
