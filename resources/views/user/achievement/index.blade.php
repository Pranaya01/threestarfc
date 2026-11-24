@extends('layouts.user.index')
@section('PageTitle', 'Achievement')
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Achievement</h2>
      <ol>
        <li><a href="{!! url('') !!}">Home</a></li>
        <li>Achievement</li>
      </ol>
    </div>

  </div>
  
</section><!-- End Breadcrumbs Section -->

<!-- ======= title Section ======= -->
<section id="title" class="title">
      <div class="container" data-aos="fade-up"> 

      <div class="row">
              

      <table id="table" class="table table-bordered">
       <!-- table-hover -->
                  <thead>
                  <tr style="text-align:center">
                    <th>Achievement No.</th>
                    <th>Tournament Name</th>
                    <th>Position</th>
                    <th>Season</th>
                    <th>Venue</th>
                    <th>Tournament Type</th>
                  </tr>
                  </thead>
                  @forelse( $title_details as $title )
                  <tbody style="color:black; font:bold; background:#ffff">
                    <tr class="text-center">
                        <td> {{$title->id}}</td>
                        <td> {{$title->tournament_details->tournament_name}}</td> 
                        <td>{{$title->position}}</td>    
                        <td>{{$title->tournament_details->season}}</td>      
                        <td>{{$title->tournament_details->venue}}</td>      
                        <td>{{ $title->tournament_type}}</td>               
                   </tbody>
                @empty
              <h5>Sorry, No Data Found!!</h5>
              @endforelse
            </table>
      </div>
      </div>
    </section><!-- End title Section -->
</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop

<!-- fzaninotto -->