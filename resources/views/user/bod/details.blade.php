@extends('layouts.user.index')
@section('PageTitle', $bod_details->name)
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

<section id="crew" class="crew">
      <div class="container" data-aos="fade-up">
        <!-- <div class="section-title">
          <h2 style="text-align:center; font-family: Open Sans; font-weight: 700; font-size: 30px; color: #0563bb;">About Board of Directors</h2>
        </div> -->

        <div class="row">
          <div class="col-lg-4">
            <img src="{{url('images/boardimages', $bod_details->image)}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3>{{ $bod_details->name }}</h3>
            <h5>{{ $bod_details->bodposition->value }}</h5>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="icofont-briefcase"></i> <strong>Profession:</strong> {{ $bod_details->profession }}</li>
                  <li><i class="icofont-phone"></i> <strong>Contact No:</strong> {{ $bod_details->contact_no }}</li>
                  <li><i class="icofont-location-pin"></i> <strong>Address:</strong> {{ $bod_details->address }}</li>
                </ul>
              </div>
  
            </div>
            <h6 style><i class="icofont-unity-hand" style="color: #0563bb;"></i> <strong>Contribution:</strong> </h6>
            <p>
              {{ $bod_details->contribution }}
            </p>
            
            <div class="back">
                  <a href="{!! url('board-of-directors'); !!}">Back</a>
              </div>  
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