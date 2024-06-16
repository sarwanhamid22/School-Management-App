<!-- resources/views/grades/show.blade.php -->
@extends('layouts.master')

@section('title', 'Grade Details')

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
                            <li class="breadcrumb-item"><a href="{{ route('listGrades') }}">Grades</a></li>
                            <li class="breadcrumb-item active">Grade Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container mt-5">
            <h1 class="mt-5">Grade Details</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Student</th>
                            <td>{{ $grade->student->name }}</td>
                        </tr>
                        <tr>
                            <th>Student ID</th>
                            <td>{{ $grade->student->student_id }}</td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td>{{ $grade->student->class }}</td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td>{{ $grade->subject }}</td>
                        </tr>
                        <tr>
                            <th>Grade</th>
                            <td>{{ $grade->grade }}</td>
                        </tr>
                    </table>
                    <br>
                    <a href="{{ route('listGrades') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
