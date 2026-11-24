@extends('layouts.user.index')
@section('PageTitle', 'Contact Us') 
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Contact Us</h2>
      <ol>
        <li><a href="{!! url('')!!}">Home</a></li>
        <li>Contact Us</li>
      </ol>
    </div>

  </div>
  
</section><!-- End Breadcrumbs Section -->
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

       <!-- <div class="section-title">
          <h2 style="text-align:center; font-family: Open Sans; font-weight: 700; font-size: 30px; color: #0563bb;">Contact Us</h2>
        </div> -->

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

          <div class="col-lg-5">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Mangal Bazar, Lalitpur</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>thstrclub@yahoo.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>9851055037</p>
              </div>

            </div>

          </div>

          <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

             <iframe
                src="https://forms.gle/2zP5fAWhgJLoMbcs7"
                width="100%"
                height="450"
                frameborder="0"
                marginheight="0"
                marginwidth="0">
                Loading…
            </iframe>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
 


</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop