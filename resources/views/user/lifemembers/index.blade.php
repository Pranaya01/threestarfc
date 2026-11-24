@extends('layouts.user.index')
@section('PageTitle', 'LifeTime Members') 
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Life Members</h2>
      <ol>
        <li><a href="{!! url('')!!}">Home</a></li>
        <li>Life Members</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->
  <!-- ======= Our Crew Section ======= -->
  <section id="crew" class="crew">
      <div class="container">
        <div class="section-title">
       <table id="table" class="table table-bordered">
       <!-- table-hover -->
                  <thead>
                  <tr style="text-align:center">
                  <th>LF. No.</th>
                    <th>Name</th>
                  </tr>
                  </thead>
                  @forelse( $lifemembers_details as $life )
                <tbody style="color:black; font:bold; background:#ffff">
                    <tr class="text-center">
                        <td> {{$life->id}}</td>
                        <td> {{$life->name}}</td>       
                    </tr>
                </tbody>
                @empty
              <h5>Sorry, No Data Found!!</h5>
              @endforelse
            </table> 
            {!! $lifemembers_details->links() !!}

        </div> 
        </div>
            
       
        
    </section><!-- End Our Team Section -->



</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop