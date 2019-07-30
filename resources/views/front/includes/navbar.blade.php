@section('navbar')
<!--Navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('home')}}">Men<span>tor</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="#feature">Features</a></li>
          <li><a href="#organisations">About</a></li>
          <li><a href="#courses">Courses</a></li>
          <li><a href="#testimonial">Testimonial</a></li> -->
          @guest
            <li><a href="{{route('login')}}">Sign in</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
          @endguest
          @auth
          <li class="dropdown">
                <a type="button" data-toggle="dropdown">{{auth()->user()->name}}
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('features.index')}}">Feature Management</a></li>
                    <li><a href="{{route('about.index')}}">About Management</a></li>
                    <li><a href="{{route('courses.index')}}">Courses Management</a></li>
                    <li><a href="{{route('testimonials.index')}}">Testimonial Management</a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>
                </ul>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
  

@endsection