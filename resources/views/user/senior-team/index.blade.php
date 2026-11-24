@extends('layouts.user.index')
@section('PageTitle', 'Senior Team') 
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Senior Team</h2>
      <ol>
        <li><a href="{!! url(''); !!}">Home</a></li>
        <li>Senior Team</li>
      </ol>
    </div>

  </div>
  
</section><!-- End Breadcrumbs Section -->
  <!-- ======= Our Crew Section ======= -->
  <section id="crew" class="crew">
      <div class="container">
      <div class="section-title">
          <h2>GoalKeeper</h2>
        </div>
        <div class="row">
        @forelse( $gk_details as $gk )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/team', $gk->image)}}" class="img-fluid" alt="Player Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                <a href="{{ route('senior-team.show', $gk->id) }}">{{ $gk->fullname }}</a>
                </h4>
                <span>{{ $gk->jersey_no }} | {{ $gk->player_position->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
        </div>
        <div class="section-title">
          <h2>Defenders</h2>
        </div>
        <div class="row">
        @forelse( $defender_details as $defender )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/team', $defender->image)}}" class="img-fluid" alt="Player Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                <a href="{{ route('senior-team.show', $defender->id) }}">{{ $defender->fullname }}</a>
                </h4>
                <span>{{ $defender->jersey_no }} | {{ $defender->player_position->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
        </div>
        <div class="section-title">
          <h2>Midfielders</h2>
        </div>
        <div class="row">
        @forelse( $midfielder_details as $mid )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/team', $mid->image)}}" class="img-fluid" alt="Player Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                <a href="{{ route('senior-team.show', $mid->id) }}">{{ $mid->fullname }}</a>
                </h4>
                <span>{{ $mid->jersey_no }} | {{ $mid->player_position->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
        </div>
        <div class="section-title">
          <h2>Forwards</h2>
        </div>
        <div class="row">
        @forelse( $forward_details as $forward )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/team', $forward->image)}}" class="img-fluid" alt="Player Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                <a href="{{ route('senior-team.show', $forward->id) }}">{{ $forward->fullname }}</a>
                </h4>
                <span>{{ $forward->jersey_no }} | {{ $forward->player_position->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h5>Sorry, No Data Found!!</h5>
          @endforelse
        </div>
        
    </section><!-- End Our Creaw Section -->


</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop