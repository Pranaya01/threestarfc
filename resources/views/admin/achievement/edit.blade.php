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
            <h1>Achievement Tables</h1>
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
                <h3 class="card-title">Edit Achievement Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <h3 class="alert alert-success"> EDIT Achivement<span class="fa fa-user" style="float:right"> {{$achievement_details->achievement_details->value}} </span> </h3>
              <form method="POST" action="{{route('achievement.update', $achievement_details->id) }}">
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
                      <label for="tournament_id" class="col-sm-6" style="color:black; text:bold">Tournament:</label>
                      <div class="col-sm-6">
                          <select name="tournament_id" id="tournament_id" class="form-control form-control-sm" >
                                  <option value="{{$achievement_details->tournament_id}}">{{$achievement_details->tournament_details->tournament_name }}</option>
                                  <option value="">---Select Tournament---</option>
                                  @foreach ($tournaments_details as $tournament)
                                  <option value="{{ $tournament->id }}">{{ $tournament->tournament_name }}</option>
                                  @endforeach
                              
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="achievement_type" class="col-sm-6" style="color:black; text:bold">Achievement Type:</label>
                      <div class="col-sm-6">
                          <select name="achievement_type" id="achievement_type" class="form-control form-control-sm" >
                                  <option value="{{$achievement_details->achievement_type}}">{{$achievement_details->achievement_details->value }}</option>
                                  <option value="">---Select Achievement Type---</option>
                                  @foreach ($value_details as $value)
                                  <option value="{{ $value->id }}">{{ $value->value }}</option>
                                  @endforeach
                              
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-6" style="color:black; text:bold">Season:</label>
                    <div class="col-sm-6">
                        <input type="text" name="season" class="form-control form-control-sm" id="season" value="{{ $achievement_details-> season }}">
                    </div>
                </div>
        
                  <div class="form-group">
                      <label for="position" class="col-sm-6" style="color:black; text:bold">Position:</label>
                      <div class="col-sm-6">
                          <input type="text" name="position" class="form-control form-control-sm" id="position" value="{{ $achievement_details->position }}">
                      </div>
                  </div>  
                  <br>
                  <a href="{{ route('achievement.index') }}" class="btn btn-warning">Cancel</a>
                  <button type="submit"class="btn btn-primary">Add Achievement Details</button>
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
