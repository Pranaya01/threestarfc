@extends('layouts.user.index')
@section('PageTitle', 'Past Presidents') 
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Past Presidents</h2>
      <ol>
        <li><a href="{!! url(''); !!}">Home</a></li>
        <li>Past Presidents</li>
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
        @forelse( $pastpresidents_details as $past )
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{url('images/pastpresidents', $past->image)}}" class="img-fluid" alt="Past President Pic"></div>
              <div class="member-info">
                <h4>{{ $past->name }}</h4>
                <!-- <a href="{{ route('past-presidents.show', $past->id) }}">{{ $past->name }}</a> -->
                <span>{{ $past->term }}</span>
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