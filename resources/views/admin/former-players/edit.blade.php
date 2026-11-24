@extends('layouts.includes.index')
@section('master')

 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.sidenav')
  <div class="content-wrapper">
    <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container">
        @if($message = Session::get('Success'))
        <div class="alert alert-success">
            <p align="center">{{$message}}</p>
        </div>
        @endif

        @if($message = Session::get('error'))
        <div class="alert alert-danger">
            <p align="center">{{$message}}</p>
        </div>
        @endif
    </div>
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1> Former Player Tables</h1>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Former Player Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <h2 class="alert alert-success"> EDIT Details<span class="fa fa-user" style="float:right">{{$formerplayers_details->name}}</span></h2>
              <form method="POST" action="{{ route('past-players.update', $formerplayers_details->id) }}" > 
              @csrf
              @method('PUT')
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="fullname" class="col-sm-3" style="color:black; text:bold">Name:</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control form-control-sm" id="fullname" placeholder="Enter the Name" value="{{ $formerplayers_details->name }}">
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="place_of_address" class="col-sm-3" style="color:black; text:bold">Address:</label>
                    <div class="col-sm-6">
                        <input type="text" name="address" class="form-control form-control-sm" id="place_of_birth" placeholder="Enter Player's Address" value="{{ $formerplayers_details->address }}">
                    </div>
                </div>
                  <br>
                  <a href="{{ route('past-players.index') }}" class="btn btn-warning">Back</a>
                  <button type="submit" class="btn btn-info input-lg">Update Details</button>
                  <hr>
              </form>
              
                <br>
            </div>
            <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
                  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop
