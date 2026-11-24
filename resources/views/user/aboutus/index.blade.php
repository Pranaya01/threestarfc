@extends('layouts.user.index')
@section('PageTitle', 'About the Club')
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>About The Club</h2>
      <ol>
        <li><a href="{!! url('')!!}">Home</a></li>
        <li>About The Club</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page">
  <div class="container">
    <!-- <img src="{{ asset('images/national-league.jpg') }}" class="about-us-img"> -->

  <img class="d-block w-100" src="{{ asset('images/aboutus  .jpg') }}" alt="About Us" style="object-position: top">
              <p><span style="font-family: Open Sans; font-size:30px;">Three Star Club</span> is one of the well-established and successful clubs in Nepal. The club had a modest beginning in 2031 B.S. A group of enthusiastic young people of Patan Durbar Square, Mangal Bazar established the club for sports development, social service, personality development and brotherhood. The club has been organizing many activities since then, but it is more recognizable as one of the leading football teams in the country. The number of members is increasing rapidly. Currently, Three Star Club has 380 life members and 129 general members.</p>
              <p style="font-family: Open Sans;">Three Star Club’s football journey started from D-Division league. The club managed to reach A-Division league in 2039 B.S. Since then, Three Star Club has produced steady stream of qualitative performance in national and international tournaments. Four times national league champion, the club has an avid fan following in the country and boasts of many national players. They have their own official fan group named "We Are Stars". They last won the National League in 2015. In the recent 2018 season they finished third below Manang Marshyangdi club and Sankata Club.</p>          
  </div>
</section>

</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop

<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="intl-msg">
                                                                                            <p onclick="msg('1')" data-toggle="modal" data-target="#other-msg">FIFA President's Message <span class="fa fa-chevron-right right" aria-hidden="true"></span> </p>
                                                                                                                            <p onclick="msg('2')" data-toggle="modal" data-target="#other-msg">AFC President's Message <span class="fa fa-chevron-right right" aria-hidden="true"></span> </p>
                                                                                                                            <p onclick="msg('3')" data-toggle="modal" data-target="#other-msg">AFC General Secretary's Message <span class="fa fa-chevron-right right" aria-hidden="true"></span> </p>
                                                                        
                                                                        </div>

                                                                        <div class="row no-gutters">
      <div class="col-lg-6 video-box">
        <img src="{{ asset('assets/img/president-img.png') }}" class="img-fluid" alt="President Image" style="margin-top:0%; margin-left:0%; height:200px; weight:70%"> -->
