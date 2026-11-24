@extends('layouts.user.index')
@section('PageTitle', 'Founders') 
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Founders of Three Star Club</h2>
      <ol>
        <li><a href="{!! url('')!!}">Home</a></li>
        <li>Founders</li>
      </ol>
    </div>

  </div>
  
</section><!-- End Breadcrumbs Section -->
  <!-- ======= Our Crew Section ======= -->
  <section id="crew" class="crew">
      <div class="container">
        <div class="row">
        @forelse( $founders_details as $founder)
        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
            <div class="pic"><img src="{{url('images/founders', $founder->image)}}" class="img-fluid" alt="Founder Pic"></div>
                <div class="member-info">
                <h4>{{ $founder->name }}</a></h4>
                <span>{{ $founder->position }}</span>
                </div>
            </div>
            </div>
            @empty
            <h5>Sorry, No Data Found!!</h5>
            @endforelse

        </div>
    </div>
        
        
    </section><!-- End Our Crew Section -->


</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop