<!-- resources/views/grades/create.blade.php -->
@extends('layouts.master')

@section('title', 'Grades')

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
                            <li class="breadcrumb-item active">Add Grade</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container mt-5">
            <h1 class="mt-5">Add Grade</h1>
            <form action="{{ route('storeGrades') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="student_name">Student</label>
                    <select name="student_name" id="student_name" class="form-control">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <select name="student_id" id="student_id" class="form-control">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->student_id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="student_id">Class</label>
                    <select name="student_class" id="student_class" class="form-control">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->class }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label for="grade">Grade</label>
                    <input type="number" step="0.01" name="grade" id="grade" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="{{ route('listGrades') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
