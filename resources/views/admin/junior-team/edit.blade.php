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
            <h1> Junior Team Tables</h1>
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
                <h3 class="card-title">Edit Junior Team Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <h2 class="alert alert-success " > EDIT Details<span class="fa fa-user" style="float:right">{{$juniorteam_details->fullname}}</span></h2>
              <form method="POST" action="{{ route('Second-team.update', $juniorteam_details->id) }}" enctype="multipart/form-data"> 
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
                        <input type="text" name="fullname" class="form-control form-control-sm" id="fullname" placeholder="Enter the Name" value="{{ $juniorteam_details->fullname }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="team" class="col-sm-3" style="color:black; text:bold">Team:</label>
                    <div class="col-sm-6">
                      <select name="team" id="team" class="form-control form-control-sm" >
                      <option value="{{ $juniorteam_details->team}}">{{ $juniorteam_details->team }}</option>
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
                          <option value="{{ $juniorteam_details->gender}}">{{ $juniorteam_details->gender }}</option>
                          <option value="">--Select Gender--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_of_birth" class="col-sm-3" style="color:black; text:bold">Date of Birth:</label>
                    <div class="col-sm-6">
                        <input type="date" name="date_of_birth" class="form-control form-control-sm" id="date_of_birth" placeholder="Enter Player's Date of Birth" value="{{ $juniorteam_details->date_of_birth }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="place_of_address" class="col-sm-3" style="color:black; text:bold">Address:</label>
                    <div class="col-sm-6">
                        <input type="text" name="address" class="form-control form-control-sm" id="place_of_birth" placeholder="Enter Player's Address" value="{{ $juniorteam_details->address }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-sm-3" style="color:black; text:bold">Country:</label>
                    <div class="col-sm-6">
                        <input type="text" name="country" class="form-control form-control-sm" id="country" placeholder="Enter Player's Country" value="{{ $juniorteam_details->country }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="position" class="col-sm-3" style="color:black; text:bold">Position:</label>
                    <div class="col-sm-6">
                        <select name="position" id="position" class="form-control form-control-sm" >
                            <option value="{{ $juniorteam_details->position }}">{{$juniorteam_details->player_position->value}}</option>
                            <option value=>--Select Player's Position--</option>
                            @foreach ($value_details as $value)
                            <option value="{{ $value->id }}">{{ $value->value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="height" class="col-sm-3" style="color:black; text:bold">Height:</label>
                    <div class="col-sm-6">
                        <input type="text" name="height" class="form-control form-control-sm" id="height" value="{{ $juniorteam_details->height}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="weight" class="col-sm-3" style="color:black; text:bold">Weight:</label>
                    <div class="col-sm-6">
                        <input type="text" name="weight" class="form-control form-control-sm" id="weight" value="{{ $juniorteam_details->weight }}" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="prefered_foot" class="col-sm-3" style="color:black; text:bold">Prefered Foot:</label>
                    <div class="col-sm-6">
                        <input type="text" name="prefered_foot" class="form-control form-control-sm" id="prefered_foot" value="{{ $juniorteam_details->prefered_foot }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="jersey_no" class="col-sm-3" style="color:black; text:bold">Jersey No:</label>
                    <div class="col-sm-6">
                        <input type="text" name="jersey_no" class="form-control form-control-sm" id="jersey_no" value="{{ $juniorteam_details->jersey_no }}" >
                    </div>
                </div>
                  <div class="form-group-row">
                          <label for="file" class="col-sm-3" style="color:black; text:bold">Choose File:</label>
                          <div class="form-group col-md-6">
                              <input type="file" name="image" id="image" class="form-control">
                          </div>
                          <div class="form-group col-md-3">
                              <img src="{{ URL::to('/') }}/images/team/{{ $juniorteam_details->image }}" class="rectangle" width="200" height="200" />
                              <input type="hidden" name="hidden_image" value="{{ $juniorteam_details->image }}" />
                          </div>
                      </div> 
                  <a href="{{ route('second-team.index') }}" class="btn btn-warning">Back</a>
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
