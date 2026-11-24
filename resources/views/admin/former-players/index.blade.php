@extends('layouts.includes.index')
@section('master')
  <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        </ul>
    </nav>
  @include('admin.sidenav')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Former Players Section</h4>
            </div>
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">News Tables</li>
                </ol>
            </div> -->
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>
        <div class="container">
        <!-- <h2 class="text-center" style="color:black; text:bold">News Details</h2> -->
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
        <div class="row">
          <div class="col-12">
          <div align="right">
            <a href="{{ route('past-players.create') }} " class="btn btn-sm btn-success"><span class="fa fa-edit"></span>Add Former Players Detail</a>
             </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Former Players Table</h3>
                <div class="card-tools">
              
                </div>
              </div>
              <div class="card-body">
              <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No.</th>
                    <th >Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                @forelse($formerplayers_details as $former)
                  <tbody style="color:black; font:bold; background:#ffff">
                      <tr class="text-center">
                          <td>{{ $former->id }}</td>
                          <td>{{ $former->name }}</td>         
                          <td>{{ $former->address}}</td>
                          <td>
                            <form action="{{ route('past-players.destroy', $former->id) }}" method="post">
                                <a href="{{ route('past-players.edit', $former->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Delete</button>
                                </form>
                          </td>
                      </tr>
                  </tbody>
                  @empty
                  <h3>Sorry, No Data Found!!</h3>
                  @endforelse
           
                </table>
                {!! $formerplayers_details->links() !!}

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
          </div>
        </div>
    </div> 
@stop