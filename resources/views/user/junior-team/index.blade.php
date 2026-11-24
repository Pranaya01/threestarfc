@extends('layouts.user.index')
@section('PageTitle', 'Junior Team') 
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Junior Team</h2>
      <ol>
        <li><a href="{!! url('')!!}">Home</a></li>
        <li>Junior Team</li>
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
        @forelse( $g_details as $g )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/team', $g->image)}}" class="img-fluid" alt="Player Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                <a href="{{ route('junior-team.show', $g->id) }}">{{ $g->fullname }}</a>
                </h4>
                <span>{{ $g->jersey_no }} | {{ $g->player_position->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h3>Sorry, No Data Found!!</h3>
          @endforelse
        </div>
        <div class="section-title">
          <h2>Defenders</h2>
        </div>
        <div class="row">
        @forelse( $d_details as $d )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/team', $d->image)}}" class="img-fluid" alt="Player Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                <a href="{{ route('junior-team.show', $d->id) }}">{{ $d->fullname }}</a>
                </h4>
                <span>{{ $d->jersey_no }} | {{ $d->player_position->value }}</span>
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
        @forelse( $m_details as $m)
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/team', $m->image)}}" class="img-fluid" alt="Player Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                <a href="{{ route('junior-team.show', $m->id) }}">{{ $m->fullname }}</a>
                </h4>
                <span>{{ $m->jersey_no }} | {{ $m->player_position->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h3>Sorry, No Data Found!!</h3>
          @endforelse
        </div>
        <div class="section-title">
          <h2>Forwards</h2>
        </div>
        <div class="row">
        @forelse( $f_details as $f)
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/team', $f->image)}}" class="img-fluid" alt="Player Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                <a href="{{ route('junior-team.show', $f->id) }}">{{ $forward->fullname }}</a>
                </h4>
                <span>{{ $f->jersey_no }} | {{ $f->player_position->value }}</span>
              </div>
            </div>
          </div>
          @empty
          <h3>Sorry, No Data Found!!</h3>
          @endforelse
        </div>
        
    </section><!-- End Our Creaw Section -->


</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop