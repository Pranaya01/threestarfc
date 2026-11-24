@extends('layouts.user.index')
@section('PageTitle', 'About the Club')
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>About Three Star Cafe</h2>
      <ol>
        <li><a href="{!! url('')!!}">Home</a></li>
        <li>About Three Star Cafe</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page">
  <div class="container">
    <!-- <img src="{{ asset('images/national-league.jpg') }}" class="about-us-img"> -->

  <img class="d-block w-100" src="{{ asset('images/threestarcafe.jpg') }}" alt="About Us" style="object-position: top">
              <p><span style="font-family: Open Sans; font-size:30px;">Three Star Cafe</span> is a cafe owned and run by Three Star Club, bringing together our passion for football and love for great food. Backed by over 50 years of club glory in Patan, our cafe in Mangalbazar offers freshly brewed coffee, delicious local favorites, and a welcoming space for supporters and visitors alike—where every visit directly supports Three Star Club.</p>
  </div>
</section>

</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop

