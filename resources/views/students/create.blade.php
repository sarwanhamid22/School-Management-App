<!-- resources/views/students/create.blade.php -->
@extends('layouts.master')

@section('title', 'Add Student')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('listStudents') }}">Students</a></li>
                        <li class="breadcrumb-item active">Add Student</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container mt-5">
            <h1 class="mt-5">Add Student</h1>
            <form action="{{ route('storeStudents') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="class">Class</label>
                    <input type="text" name="class" id="class" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="birth_date">Birth Date</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="{{ route('listStudents') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
