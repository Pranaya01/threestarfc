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
            <h1>Create Junior Team Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Junior Team Tables</li>
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
                <h3 class="card-title">Junior Team Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('second-team.store') }}" enctype="multipart/form-data">
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
                    <label for="fullname" class="col-sm-3" style="color:black; text:bold">Name:</label>
                    <div class="col-sm-6">
                        <input type="text" name="fullname" class="form-control form-control-sm" id="fullname" placeholder="Enter the Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3" style="color:black; text:bold">Team Type:</label>
                    <div class="col-sm-6">
                        <select name="team" id="team" class="form-control form-control-sm" >
                            <option value="">---Select Team Type---</option>
                            <option value="Junior">Junior</option>
                            <option value="Senior">Senior</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="gender" class="col-sm-3" style="color:black; text:bold">Gender:</label>
                    <div class="col-sm-6">
                        <select name="gender" id="gender" class="form-control form-control-sm" >
                        <option value="">--Select Player's Gender </option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_of_birth" class="col-sm-3" style="color:black; text:bold">Date of Birth:</label>
                    <div class="col-sm-6">
                        <input type="date" name="date_of_birth" class="form-control form-control-sm" id="date_of_birth" placeholder="Enter Player's Date of Birth" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="place_of_address" class="col-sm-3" style="color:black; text:bold">Address:</label>
                    <div class="col-sm-6">
                        <input type="text" name="address" class="form-control form-control-sm" id="place_of_birth" placeholder="Enter Player's Address" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-sm-3" style="color:black; text:bold">Country:</label>
                    <div class="col-sm-6">
                        <input type="text" name="country" class="form-control form-control-sm" id="country" placeholder="Enter Player's Country" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="position" class="col-sm-3" style="color:black; text:bold">Position:</label>
                    <div class="col-sm-6">
                        <select name="position" id="position" class="form-control form-control-sm" >
                            <option value="">---Select Player's Position---</option>
                            @foreach ($value_details as $value)
                            <option value="{{ $value->id }}">{{ $value->value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="height" class="col-sm-3" style="color:black; text:bold">Height:</label>
                    <div class="col-sm-6">
                        <input type="text" name="height" class="form-control form-control-sm" id="height" placeholder="Enter Player's Height" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="weight" class="col-sm-3" style="color:black; text:bold">Weight:</label>
                    <div class="col-sm-6">
                        <input type="text" name="weight" class="form-control form-control-sm" id="weight" placeholder="Enter Player's Weight" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="prefered_foot" class="col-sm-3" style="color:black; text:bold">Prefered Foot:</label>
                    <div class="col-sm-6">
                        <input type="text" name="prefered_foot" class="form-control form-control-sm" id="prefered_foot" placeholder="Enter Prefered Foot" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="jersey_no" class="col-sm-3" style="color:black; text:bold">Jersey No:</label>
                    <div class="col-sm-6">
                        <input type="text" name="jersey_no" class="form-control form-control-sm" id="jersey_no" placeholder="Enter Jersey No" >
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="image" class="col-sm-3" style="color:black; text:bold">Choose File:</label>
                    <div class="col-sm-6">
                        <input type="file" name="image" class="form-control form-control-sm" id="image">
                    </div>
                </div>
                <br>
                <a href="{{ route('second-team.index') }}" class="btn btn-warning">Cancel</a>
                <button type="submit"class="btn btn-primary">Add Player Detail</button>
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
