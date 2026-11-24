@extends('layouts.user.index')
@section('PageTitle', 'Home')
@section('user')
@include('user.include.header')
<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      </ol>

        <div class="carousel-inner" role="listbox">
        @forelse( $imageslider_details->take(8) as $images )
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{url('images/image-slider', $images->image)}}" alt="{{ $images->title }}"  ">
                    <div class="carousel-caption ">
                    <!-- d-none d-md-block -->
                      <h2 class="animate__animated animate__fadeInDown">{{ $images->title }}</h2>
                    </div>
            </div>
            @empty
            <h5 style="margin-left:10px">Sorry, No Image Found</h5>
          @endforelse
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->
  <main id="main">

<!-- ======= About Us Section ======= -->
<section id="about" class="about">
  <div class="container">

    <div class="row no-gutters">
      <div class="col-lg-6 video-box">
        <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="Club Logo" style="margin-top:20%; margin-left:20%; height:200px; weight:40%">
      </div>

      <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

        <div class="section-title">
          <h2>About Us</h2>
        </div>
          <p>
          Three Star Club is a Nepali football club based in Patan, Lalitpur. They play in the Nepalese first division, the Martyr's Memorial A-Division League.
          Three Star Club is one of the well-established and successful clubs in Nepal. The club had a modest beginning in 2031 B.S. A group of enthusiastic young people of Patan Durbar Square, Mangal Bazar established the club for sports development, social service, personality development and brotherhood. The club has been organizing many activities since then, but it is more recognizable as one of the leading football teams in the country.
          </p>
          <div class="section-title">
          <a href="{!! url('about-us')!!}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>
    </div>
  </div>
</section><!-- End About Us Section -->

  <section class="counts section-bg">
      <div class="container">
      <div class="section-title">
          <h2>Facts & Information</h2>
        </div>
        <div class="row">

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="icofont-win-trophy" style="color: #163d8c;"></i>
              <span data-toggle="counter-up">70</span>
              <p>Trophy Won + </p>
            </div>
          </div>


          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="icofont-football" style="color: #163d8c;"></i>
              <span data-toggle="counter-up">500</span>
              <p>Match Won + </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="icofont-trophy-alt" style="color: #163d8c;"></i>
              <span data-toggle="counter-up">150</span>
              <p>Tournament Played + </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="icofont-users-social" style="color: #163d8c;"></i>
              <span data-toggle="counter-up">40</span>
              <p>Player + </p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Counts Section -->
    </main>
<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop