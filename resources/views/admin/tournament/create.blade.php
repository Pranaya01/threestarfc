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
            <h1>Create Tournament Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Tournament Tables</li>
            </ol>
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
                <h3 class="card-title">Tournament Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('tournament.store') }}" enctype="multipart/form-data">
                <form>
                @csrf
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
            <label for="tournament_name" class="col-sm-6" style="color:black; text:bold">Tournament Name:</label>
            <div class="col-sm-6">
                <input type="text" name="tournament_name" class="form-control form-control-sm" id="tournament_name" placeholder="Enter Tournament Name">
            </div>
        </div>
        <div class="form-group">
            <label for="tournament_type" class="col-sm-6" style="color:black; text:bold">Tournament Type:</label>
            <div class="col-sm-6">
                <select name="tournament_type" id="tournament_type" class="form-control form-control-sm" >
                        <option value="">---Select Tournament Type---</option>
                        @foreach ($value_details as $value)
                        <option value="{{ $value->id }}">{{ $value->value }}</option>
                        @endforeach
                    
                </select>
            </div>
        </div>
        <!-- <div class="form-group">
            <label for="" class="col-sm-6" style="color:black; text:bold">Season:</label>
            <div class="col-sm-6">
                <input type="text" name="season" class="form-control form-control-sm" id="season" placeholder="Enter Tournament Season">
            </div>
        </div> -->
        <div class="form-group">
            <label for="venue" class="col-sm-6" style="color:black; text:bold">Venue:</label>
            <div class="col-sm-6">
                <input type="text" name="venue" class="form-control form-control-sm" id="title_sponsor" placeholder="Enter Tournament Venue">
            </div>
        </div>
        <br>
        <a href="{{ route('tournament.index') }}" class="btn btn-warning">Cancel</a>
        <button type="submit"class="btn btn-primary">Add Tournament Details</button>
        <hr>
        </form> 
                    
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
