@extends('layouts.user.index')
@section('PageTitle', 'Board of Directors') 
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Board of Directors</h2>
      <ol>
        <li><a href="{!! url('')!!}">Home</a></li>
        <li>Board of Directors</li>
      </ol>
    </div>

  </div>
  
</section><!-- End Breadcrumbs Section -->
  <!-- ======= Our Crew Section ======= -->
  <section id="crew" class="crew">
      <div class="container">
        <div class="section-title">
          <h2>President</h2>
        </div>
        <div class="row" style="display: flex;justify-content: space-around;background:#fff;">
        @forelse( $president_details as $president )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/boardimages', $president->image)}}" class="img-fluid" alt="President Pic"></div>
              <div class="member-info">
                <h4 >{{ $president->name }}</h4>
                <span>{{ $president->bodposition->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
      </div>
      <div class="section-title">
          <h2>Immediate Past President</h2>
        </div>
        <div class="row" style="display: flex;justify-content: space-around;background:#fff;">
        @forelse( $ipp_details as $ipp )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/boardimages', $ipp->image)}}" class="img-fluid" alt="Immediate President Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                {{ $ipp->name }}
                </h4>
                <span>{{ $ipp->bodposition->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
      </div>
      <div class="section-title">
          <h2>Vice President</h2>
        </div>
        <div class="row">
        @forelse( $vp_details as $vp )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/boardimages', $vp->image)}}" class="img-fluid" alt="Vice-President Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
               {{ $vp->name }}
                </h4>
                <span>{{ $vp->bodposition->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
      </div>

      <div class="section-title">
          <h2>General Secretary & Secretary </h2>
        </div>
        <div class="row" style="display: flex; justify-content: center;">
        @forelse( $gs_details as $gs )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/boardimages', $gs->image)}}" class="img-fluid" alt="General Secretary Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
               {{ $gs->name }}
                </h4>
                <span>{{ $gs->bodposition->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
      </div>

      <div class="section-title">
          <h2>Treasurer and Deupty Treasurer</h2>
        </div>
        <div class="row" style="display: flex; justify-content: center;">
        @forelse( $treasurer_details as $t)
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/boardimages', $t->image)}}" class="img-fluid" alt="Treasurer Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                {{ $t->name }}
                </h4>
                <span>{{ $t->bodposition->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
      </div>
      <div class="section-title">
          <h2>Executive Members</h2>
        </div>
        <div class="row">
        @forelse( $member_details as $member )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/boardimages', $member->image)}}" class="img-fluid" alt="Member Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                {{ $member->name }}
                </h4>
                <span>{{ $member->bodposition->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
      </div>

       <div class="section-title">
          <h2>Advisors</h2>
        </div>
        <div class="row">
        @forelse( $advisor_details as $advisor )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/boardimages', $advisor->image)}}" class="img-fluid" alt="Advisor Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                {{ $advisor->name }}
                </h4>
                <span>{{ $advisor->bodposition->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
      </div>
        
        
    </section><!-- End Our Team Section -->


</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop