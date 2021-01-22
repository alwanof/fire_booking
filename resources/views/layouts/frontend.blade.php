<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Yui</title>
    <link rel="stylesheet" href="{{asset('frontend/css/framework7.bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/framework7-icons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <script>
  function initFreshChat() {
    window.fcWidget.init({
      token: "7c7eab70-ecb1-4ba2-9f69-409f49559071",
      host: "https://wchat.freshchat.com"
    });
  }
  function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
</script>
  </head>
  <body class="color-theme-pink">
    <div id="app">
      <div class="views tabs">
        <!-- Tabbar -->
        <div class="toolbar tabbar tabbar-labels toolbar-bottom">
          <div class="toolbar-inner">
            <a href="#view-today" class="tab-link tab-link-active">
              <i class="f7-icons">today</i>
              <span class="tabbar-label">Today</span>
            </a>
            <a href="#view-categories" class="tab-link">
              <i class="f7-icons">square_grid_2x2_fill</i>
              <span class="tabbar-label">Categories</span>
            </a>
            <a href="#view-discover" class="tab-link">
              <i class="f7-icons">star_fill</i>
              <span class="tabbar-label">Discover</span>
            </a>
            <a href="#view-search" class="tab-link">
              <i class="f7-icons">search</i>
              <span class="tabbar-label">Search</span>
            </a>
            <a href="#view-pages" class="tab-link">
              <i class="f7-icons">square_stack_fill</i>
              <span class="tabbar-label">Pages</span>
            </a>
          </div>
        </div>


          @yield('content')

           </div>
    </div>
    <script src="{{asset('frontend/js/framework7.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/app.js')}}"></script>
  </body>
</html>

