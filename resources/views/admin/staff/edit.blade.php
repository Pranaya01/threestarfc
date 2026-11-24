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
            <h1>Coaching Staff Tables</h1>
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
                <h3 class="card-title">Edit Coaching Staff Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <h2 class="alert alert-success " > EDIT Details<span class="fa fa-user" style="float:right">{{$staff_details->name}}</span></h2>
              <form method="POST" action="{{ route('staff.update', $staff_details->id) }}" enctype="multipart/form-data"> 
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
                          <label for="name" class="col-sm-3" style="color:black; text:bold">Name:</label>
                          <div class="col-sm-6">
                              <input type="text" name="name" class="form-control form-control-sm" id="name" value="{{ $staff_details->name }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="contact_no" class="col-sm-3" style="color:black; text:bold">Contact No:</label>
                          <div class="col-sm-6">
                              <input type="text" name="contact_no" class="form-control form-control-sm" id="contact_no" value="{{ $staff_details->contact_no}}" >
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="designation" class="col-sm-3" style="color:black; text:bold">Designation:</label>
                        <div class="col-sm-6">
                            <select name="designation" id="designation" class="form-control form-control-sm" >
                                <option value="{{ $staff_details->designation}}">{{ $staff_details->staff_position->value }}</option>
                                <option value="">---Select Designation---</option>
                                @foreach ($value_details as $value)
                                <option value="{{ $value->id }}">{{ $value->value }}</option>
                                @endforeach
                            </select>
                          </div>
                      </div>
                       
                      <div class="form-group">
                          <label for="file" class="col-sm-3" style="color:black; text:bold">Choose File:</label>
                          <div class="form-group col-md-6">
                              <input type="file" name="image" id="image" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                              <img src="{{ URL::to('/') }}/images/staff/{{ $staff_details->image }}" class="rectangle" width="300" height="200" />
                              <input type="hidden" name="hidden_image" value="{{ $staff_details->image }}" />
                          </div>
                      </div>
  
                      <a href="{{ route('staff.index') }}" class="btn btn-warning">Back</a>
                      <button type="submit" class="btn btn-info input-lg">Update Staff Detail</button>
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
