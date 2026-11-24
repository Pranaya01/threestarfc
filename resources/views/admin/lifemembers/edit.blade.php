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
            <h1> Life Members Tables</h1>
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
                <h3 class="card-title">Edit Life Members Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <h2 class="alert alert-success " > EDIT Details<span class="fa fa-user" style="float:right">{{$lifemembers_details->name}}</span></h2>
              <form method="POST" action="{{ route('lifemembers.update', $lifemembers_details->id) }}" enctype="multipart/form-data"> 
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
                          <input type="text" name="name" class="form-control form-control-sm" id="name" value="{{ $lifemembers_details->name }}">
                      </div>
                  </div>
<!-- 
                      <div class="form-group">
                          <label for="profession" class="col-sm-3" style="color:black; text:bold">Profession:</label>
                          <div class="col-sm-6">
                              <input type="text" name="profession" class="form-control form-control-sm" id="profession" value="{{ $lifemembers_details->profession}}" >
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="contact_no" class="col-sm-3" style="color:black; text:bold">Contact No:</label>
                          <div class="col-sm-6">
                              <input type="text" name="contact_no" class="form-control form-control-sm" id="contact_no" value="{{ $lifemembers_details->contact_no}}" >
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="address" class="col-sm-3" style="color:black; text:bold">Address:</label>
                          <div class="col-sm-6">
                              <input type="text" name="address" class="form-control form-control-sm" id="address" value="{{ $lifemembers_details->address }}" >
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="contribution" class="col-sm-3" style="color:black; text:bold">Contribution:</label>
                          <div class="col-sm-6">
                              <textarea cols="6" rows="6" class="form-control" name="contribution">{{ $lifemembers_details->contribution }}</textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="file" class="col-sm-3" style="color:black; text:bold">Choose File:</label>
                          <div class="form-group col-md-6">
                              <input type="file" name="image" id="image" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                              <img src="{{ URL::to('/') }}/images/lifemembers/{{ $lifemembers_details->image }}" class="rectangle" width="300" height="200" />
                              <input type="hidden" name="hidden_image" value="{{ $lifemembers_details->image }}" />
                          </div>
                      </div>         -->
                      <a href="{{ route('lifemembers.index') }}" class="btn btn-warning">Back</a>
                      <button type="submit" class="btn btn-info input-lg">Update Members Detail</button>
                      <br>
                      <br>
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
