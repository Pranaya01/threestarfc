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
            <h1>Create Coaching Staff Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Coaching Staff Tables</li>
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
                <h3 class="card-title">Coaching Staff Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('staff.store') }}" enctype="multipart/form-data">
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
                  <label for="name" class="col-sm-3" style="color:black; text:bold">Name:</label>
                  <div class="col-sm-6">
                      <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="Enter Name">
                  </div>
              </div>

              <div class="form-group">
                  <label for="contact_no" class="col-sm-3" style="color:black; text:bold">Contact No:</label>
                  <div class="col-sm-6">
                      <input type="text" name="contact_no" class="form-control form-control-sm" id="contact_no" placeholder="Enter Contact No" >
                  </div>
              </div>
             
              <div class="form-group">
                <label for="designation" class="col-sm-3"style="color:black; text:bold">Designation:</label>
                <div class="col-sm-6">
                    <select name="designation" id="designation" class="form-control form-control-sm" >
                        <option value="">---Select Designation---</option>
                        @foreach ($value_details as $value)
                        <option value="{{ $value->id }}">{{ $value->value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="form-group">
                    <label for="image" class="col-sm-3" style="color:black; text:bold">Choose File:</label>
                    <div class="col-sm-6">
                        <input type="file" name="image" class="form-control form-control-sm" id="image">
                    </div>
                </div>
                <br>
                <a href="{{ route('staff.index') }}" class="btn btn-warning">Cancel</a>
                <button type="submit"class="btn btn-primary">Add Members Details</button>
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
