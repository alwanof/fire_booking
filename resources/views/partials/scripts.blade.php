<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script>
    function showToast(Class,Title,Subtitle,Body){
        $(document).Toasts('create', {
        class:Class , 
        title:Title ,
        subtitle:Subtitle ,
        body: Body
      })
    }
</script>
@yield('script')