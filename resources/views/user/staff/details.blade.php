@extends('layouts.user.index')
@section('PageTitle', $staff_details->name ) 
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

<section id="crew" class="crew">
      <div class="container" data-aos="fade-up">
        <!-- <div class="section-title">
          <h2 style="text-align:center; font-family: Open Sans; font-weight: 700; font-size: 30px; color: #0563bb;">About Board of Directors</h2>
        </div> -->

        <div class="row">
          <div class="col-lg-2 col-md-2">
          <div class="pic">
              <img src="{{url('images/staff', $staff_details->image)}}" class="img-fluid" alt="">
          </div>
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3>{{ $staff_details->name }}</h3>
            <h5>{{ $staff_details->staff_position->value }}</h5>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="icofont-phone"></i> <strong>Contact No:</strong> {{ $staff_details->contact_no }}</li>
                </ul>
              </div>
              <div class="back">
                  <a href="{!! url('officials'); !!}">Back</a>
                </div> 
            </div>
            <!-- <h6><strong>Contribution:</strong> </h6> -->
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