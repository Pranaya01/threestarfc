@extends('layouts.user.index')
@section('PageTitle', 'President Message')
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>President Message</h2>
      <ol>
        <li><a href="{!! url(''); !!}">Home</a></li>
        <li>President Message</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page">
  <div class="container">
    <!-- <img src="{{ asset('images/national-league.jpg') }}" class="about-us-img"> -->

  <img class="rounded mx-auto d-block" src="{{ asset('assets/img/president-img.jpg') }}" alt="President Image" width="143" height="150">
	<div>
		<div>
			<p style="text-align: center;"><strong>Arun Man Joshi</strong><br>
            <span style="color: #000000;">President</span></p>
        </div>
    </div>

    <div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
			<p style="text-align: justify;"><span style="color: #000000;">Namaste ! </span></p>
<p style="text-align: justify;"><span style="color: #000000;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>
<p style="text-align: justify;"><span style="color: #000000;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&nbsp;&nbsp;</span></p>
<p style="text-align: justify;"><span style="color: #000000;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>
		</div>
	</div>
</section>

</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop
