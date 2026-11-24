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
                <h4>Tournament Section</h4>
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
            <a href="{{ route('tournament.create') }} " class="btn btn-sm btn-success"><span class="fa fa-edit"></span>Add Tournament Detail</a>
             </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tournament Table</h3>

                <div class="card-tools">
                <form action="{{route('tournamentsearch')}}" method="get">
                <div class="input-group">
                  <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="tournament-query" class="form-control float-right" placeholder="Search">
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
                    <th>Tournament Name</th>
                    <th>Tournament Type</th>
                    <!-- <th>Season</th> -->
                    <th>Venue</th>
                    <!-- <th style="color: black; text:bold">Date</th> -->
                    <th >Action</th>
                  </tr>
                  @forelse($tournaments_details as $tournament)
                  <tbody style="color:black; font:bold; background:#ffff">
                        <tr class="text-center">
                            <td> {{ $tournament->id}}
                            <td>{{ $tournament->tournament_name }}</td>
                            <td>{{ $tournament->tournamentCategory->value }}</td>
                            <!-- <td>{{ $tournament->season }}</td> -->
                            <td>{{ $tournament->venue}}</td>
                            <!-- <td>{{ $tournament->created_at->format('Y-m-d') }}</td> -->
                            <td width="25%">
                                <form action="{{ route('tournament.destroy', $tournament->id) }}" method="post">
                                <a href="{{ route('tournament.edit', $tournament->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
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
                  </thead>
                </table>
                {!! $tournaments_details->links() !!}
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