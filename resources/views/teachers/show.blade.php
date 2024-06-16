<!-- resources/views/teachers/show.blade.php -->
@extends('layouts.master')

@section('title', 'Teacher Details')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listTeachers') }}">Teachers</a></li>
                            <li class="breadcrumb-item active">Teacher Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <h1 class="mt-5">Teacher Details</h1>
                <div class="card bg-white">
                    <div class="card-body">
                        <table class="table table-bordered bg-white">
                            <tr>
                                <th>Name</th>
                                <td>{{ $teacher->name }}</td>
                            </tr>
                            <tr>
                                <th>Teacher ID</th>
                                <td>{{ $teacher->teacher_id }}</td>
                            </tr>
                            <tr>
                                <th>Specialization</th>
                                <td>{{ $teacher->specialization }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $teacher->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $teacher->address }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $teacher->email }}</td>
                            </tr>
                        </table>
                        <br>
                        <a href="{{ route('listTeachers') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
