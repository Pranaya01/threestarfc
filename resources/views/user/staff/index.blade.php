@extends('layouts.user.index')
@section('PageTitle', 'Officials') 
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Officials</h2>
      <ol>
        <li><a href="{!! url(''); !!}">Home</a></li>
        <li>Officials</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->
  <!-- ======= Our Crew Section ======= -->
  <section id="crew" class="crew">
      <div class="container">
        <div class="section-title">
          <!-- <h2>Our Board of Directors</h2> -->
           <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p> -->
        </div>
        <div class="row">
        @forelse( $staff_details as $staff )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/staff', $staff->image)}}" class="img-fluid" alt="Staff Pic"></div>
              <div class="member-info">
                <h4 style="color:white">
                  {{ $staff->name }}
                </h4>
                <span>{{ $staff->staff_position->value }}</span>
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