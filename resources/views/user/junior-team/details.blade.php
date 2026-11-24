@extends('layouts.user.index')
@section('PageTitle', $team_details->fullname)
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

<section id="crew" class="crew">
      <div class="container" data-aos="fade-up">
        <!-- <div class="section-title">
          <h2 style="text-align:center; font-family: Open Sans; font-weight: 700; font-size: 30px; color: #0563bb;">About Board of Directors</h2>
        </div> -->

        <div class="row">
          <div class="col-lg-2">
            <img src="{{url('images/team', $youthteam_details->image)}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3>{{ $youthteam_details->fullname }}</h3>
            <h5>{{ $youthteam_details->player_position->value }}</h5>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                <li><i class="icofont-ui-calendar"></i> <strong>Date of Birth:</strong> {{ $youthteam_details->date_of_birth }}</li>
                <li><i class="icofont-listing-number"></i> <strong>Age:</strong> {{\Carbon\Carbon::parse($youthteam_details->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days')}}</li>
                <li><i class="icofont-male"></i> <strong>Gender:</strong> {{ $youthteam_details->gender }}</li>
                  <li><i class="icofont-location-pin"></i> <strong>Address:</strong> {{ $youthteam_details->address }}</li>
                  <li><i class="icofont-flag"></i> <strong>Country:</strong> {{ $youthteam_details->country }}</li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                <li><i class="icofont-ruler"></i> <strong>Height:</strong> {{ $youthteam_details->height }}</li>
                <li><i class="icofont-muscle-weight"></i> <strong>Weight:</strong> {{ $youthteam_details->weight }}</li>
                <li><i class="icofont-kick"></i> <strong>Prefered Foot:</strong> {{ $youthteam_details->prefered_foot }}</li>
                <li><i class="icofont-jersey-alt"></i> <strong>Jersey No:</strong> {{ $youthteam_details->jersey_no }}</li>
              </div>
            </div>  
            <div class="back">
                  <a href="{!! url('junior-team'); !!}">Back</a>
                </div>         
          </div>

        </div>
         

      </div>
    </section><!-- End Members Section -->

</main><!-- End #main -->
</br>
</br>
</br>
</br>
<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop