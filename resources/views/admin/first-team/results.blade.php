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
                <h4>Senior Team Section</h4>
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
            <a href="{{ route('first-team.create') }} " class="btn btn-sm btn-success"><span class="fa fa-edit"></span>Add First Team Detail</a>
             </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Senior Team Table</h3>
                <div class="card-tools">
                <form action="{{route('team_search')}}" method="get">
                <div class="input-group">
                  <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="team-query" class="form-control float-right" placeholder="Search">
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
                <th >Name</th>
                <th style="color: black; text:bold">Date of Birth</th>
                <th style="color: black; text:bold">Gender</th>
                <th style="color: black; text:bold">Address</th>
                <th style="color: black; text:bold">Country</th>
                <th style="color: black; text:bold">Position</th>
                <th style="color: black; text:bold">Height</th>
                <th style="color: black; text:bold">Weight</th>
                <th style="color: black; text:bold">Prefered Foot</th>
                <th style="color: black; text:bold">Jersey No.</th>
                <th style="color: black; text:bold">Image</th>
                <th style="color: black; text:bold">Action</th>
            </tr>
            @forelse($firstteam_details as $first)
                  <tbody style="color:black; font:bold; background:#ffff">
                      <tr class="text-center">
                          <td>{{ $first->id }}</td>
                          <td>{{ $first->fullname }}</td>
                          <td>{{ $first->date_of_birth }}</td>
                          <td>{{ $first->gender }}</td>
                          <td>{{ $first->address}}</td>
                          <td>{{ $first->country }}</td>
                          <td>{{ $first->player_position->value}}</td>
                          <td>{{ $first->height }}</td>
                          <td>{{ $first->weight}}</td>
                          <td>{{ $first->prefered_foot }}</td>
                          <td>{{ $first->jersey_no}}</td>
                          <td><img src="{{ URL::to('/') }}/images/team/{{ $first->image }}" width="50" height="60" /></td>
                          <td width="10%">
                            <form action="{{ route('first-team.destroy', $first->id) }}" method="post">
                                <!-- <a href="{{ route('first-team.show', $first->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span>Show</a> -->
                                <a href="{{ route('first-team.edit', $first->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
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
                {!! $firstteam_details->links() !!}
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