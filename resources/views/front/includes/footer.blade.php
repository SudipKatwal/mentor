@section('footer')
  <!--Footer-->
  <footer id="footer" class="footer">
    <div class="container text-center">

      
      <!-- End newsletter-form -->
      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
      ©2016 Mentor Theme. All rights reserved
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mentor
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
      </div>
    </div>
  </footer>
  <!--/ Footer-->

  <script src="{{URL::to('js/jquery.min.js')}}"></script>
  <script src="{{URL::to('js/jquery.easing.min.js')}}"></script>
  <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
  <script src="{{URL::to('js/custom.js')}}"></script>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

  @yield('scripts')
</body>

</html>

@endsection