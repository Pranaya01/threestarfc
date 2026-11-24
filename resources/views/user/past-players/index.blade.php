@extends('layouts.user.index')
@section('PageTitle', 'Former Players') 
@section('user')
@include('user.include.header')

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Former Players</h2>
      <ol>
        <li><a href="{!! url('')!!}">Home</a></li>
        <li>Former Players</li>
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
                  <th>S.No.</th>
                    <th>Name</th>
                    <th>Address</th>
                  </tr>
                  </thead>
                  @forelse( $formerplayers_details as $former )
                <tbody style="color:black; font:bold; background:#ffff">
                    <tr class="text-center">
                        <td> {{$former->id}}</td>
                        <td> {{$former->name}}</td>     
                        <td> {{$former->address}}</td>         
                    </tr>
                </tbody>
                @empty
              <h5>Sorry, No Data Found!!</h5>
              @endforelse
            </table> 
            {!! $formerplayers_details->links() !!}

        </div> 
        </div>
        
    </section><!-- End Our Creaw Section -->


</main><!-- End #main -->

<div id="preloader"></div>
@include('user.include.sponsor')
@include('user.include.footer')
@stop