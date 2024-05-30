<!-- resources/views/teachers/index.blade.php -->
@extends('layouts.master')

@section('title', 'Teachers')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List of Teachers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">List of Teachers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
         <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Teachers SMK Gamelab</h1>
                <a href="{{ route('teachers.create') }}" class="btn btn-primary">Add Teacher</a>
            </div>
        
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        
            <div class="card">
                <div class="card-body">
                <table class="table table-bordered bg-white">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->specialization }}</td>
                                <td>{{ $teacher->phone_number }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>
                                    <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
         </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
