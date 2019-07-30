@extends('front.layouts.master')
@section('content')
  <!--Banner-->
  <div class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="banner-text text-center">
            <div class="text-border">
              <h2 class="text-dec">Trust & Quality</h2>
            </div>
            <div class="intro-para text-center quote">
              <p class="big-text">Learning Today . . . Leading Tomorrow.</p>
              <p class="small-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium enim repellat sapiente quos architecto<br>Laudantium enim repellat sapiente quos architecto</p>
            </div>
            <a href="#feature" class="mouse-hover">
              <div class="mouse"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Banner-->
  <!--Feature-->
  <section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Our Partners</h2>
          <p>Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.</p>
          <hr class="bottom-line">
        </div>
        <div class="feature-info">
          @if(count($colleges)>0)
            @foreach($colleges as $key=>$college)
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4><a href="{{route('profile',$college->id)}}">{{$college->name}}</a></h4>
                  <p>{!! empty($college->about->descriptions) ? '' : $college->about->descriptions !!}</p>
                </div>
                <div class="fea-img pull-left">
                  <i class="fa fa-css3"></i>
                </div>
              </div>
            </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </section>
  <!--/ feature-->
  
@endsection