<!-- resources/views/students/show.blade.php -->
@extends('layouts.master')

@section('title', 'Student Details')
@php
    use Carbon\Carbon;
@endphp

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
                            <li class="breadcrumb-item"><a href="{{ route('listStudents') }}">Students</a></li>
                            <li class="breadcrumb-item active">Student Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container mt-5">
            <h1 class="mt-5">Student Details</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <th>Student ID</th>
                            <td>{{ $student->student_id }}</td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td>{{ $student->class }}</td>
                        </tr>
                        <tr>
                            <th>Birth Date</th>
                            <td>{{ Carbon::parse($student->birth_date)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $student->address }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $student->phone_number }}</td>
                        </tr>
                    </table>
                    <br>
                    <a href="{{ route('listStudents') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
