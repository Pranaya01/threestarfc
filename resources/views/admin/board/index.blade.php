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
                <h5>Board Section</h5>
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
            <a href="{{ route('board.create') }} " class="btn btn-sm btn-success"><span class="fa fa-edit"></span>Add Board Member</a>
             </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Board of Directors Table</h3>

                <div class="card-tools">
                <form action="{{route('boardsearch')}}" method="get">
                <div class="input-group">
                  <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="board-query" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
               </form>
                </div>
              </div>
              <div class="card-body">
              <table id="usertable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Profession</th>
                        <th>Contact No.</th>
                        <th>Address</th>
                        <th>Contribution</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  @forelse($bod_details as $bod)
                  <tbody style="color:black; font:bold; background:#ffff">
                  <tr class="text-center">
                      <td>{{ $bod->id }}</td>
                      <td>{{ $bod->name }}</td>
                      <td>{{ $bod->bodposition->value }}</td>
                      <td>{{ $bod->profession }}</td>
                      <td>{{ $bod->contact_no }}</td>
                      <td>{{ $bod->address }}</td>
                      <td>{{ Str::limit($bod->contribution, 50) }}</td>
                      <td><img src="{{ URL::to('/') }}/images/boardimages/{{ $bod->image }}" width="80" height="60" /></td>
                      <td width="20%">
                        <form action="{{ route('board.destroy', $bod->id) }}" method="post">
                        <!-- <a href="{{ route('board.show', $bod->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span>Show</a> -->
                        <a href="{{ route('board.edit', $bod->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
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
                {!! $bod_details->links() !!}
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