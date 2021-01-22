    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <ul class="h-100 d-flex align-items-center justify-content-between pl-0">
            <li class="active"><a href="{{route('provider',$provider->username)}}"><i class="lni lni-home"></i>Home</a></li>
            <li><a href="message.html"><i class="lni lni-life-ring"></i>Support</a></li>
            <li><a href="cart.html"><i class="lni lni-shopping-basket"></i>Cart</a></li>
            <li><a href="pages.html"><i class="lni lni-heart"></i>Pages</a></li>
            <li><a href="settings.html"><i class="lni lni-cog"></i>Settings</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="{{asset('/v2/js/jquery.min.js')}}"></script>
    <script src="{{asset('/v2/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/v2/js/waypoints.min.js')}}"></script>
    <script src="{{asset('/v2/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('/v2/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/v2/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/v2/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('/v2/js/default/jquery.passwordstrength.js')}}"></script>
    <script src="{{asset('/v2/js/wow.min.js')}}"></script>
    <script src="{{asset('/v2/js/jarallax.min.js')}}"></script>
    <script src="{{asset('/v2/js/jarallax-video.min.js')}}"></script>
    <script src="{{asset('/v2/js/default/dark-mode-switch.js')}}"></script>
    <script src="{{asset('/v2/js/default/no-internet.js')}}"></script>
    <script src="{{asset('/v2/js/default/active.js')}}"></script>
    <script src="{{asset('/v2/js/pwa.js')}}"></script>
    @yield('scripts')
  </body>
</html>
