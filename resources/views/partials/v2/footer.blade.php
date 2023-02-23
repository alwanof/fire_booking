    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <ul class="h-100 d-flex align-items-center justify-content-between pl-0">
            <li class="active"><a href="{{route('provider',$provider->username)}}"><i class="lni lni-home"></i>Home</a></li>
            <li><a href="{{route('provider.provider_arguments',$provider->username)}}"><i class="lni lni-life-ring"></i>Arguments</a></li>
            <li><a href="{{route('customer_front.reservation_form',$provider->username)}}"><i class="lni lni-ban"></i>Cancellation</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="/v2/js/jquery.min.js"></script>
    <script src="/v2/js/bootstrap.bundle.min.js"></script>
    <script src="/v2/js/waypoints.min.js"></script>
    <script src="/v2/js/jquery.easing.min.js"></script>
    <script src="/v2/js/owl.carousel.min.js"></script>
    <script src="/v2/js/jquery.counterup.min.js"></script>
    <script src="/v2/js/jquery.countdown.min.js"></script>
    <script src="/v2/js/default/jquery.passwordstrength.js"></script>
    <script src="/v2/js/wow.min.js"></script>
    <script src="/v2/js/jarallax.min.js"></script>
    <script src="/v2/js/jarallax-video.min.js"></script>
    <script src="/v2/js/default/dark-mode-switch.js"></script>
    <script src="/v2/js/default/no-internet.js"></script>
    <script src="/v2/js/default/active.js"></script>
    <script src="/v2/js/pwa.js"></script>
    @yield('scripts')
  </body>
</html>
