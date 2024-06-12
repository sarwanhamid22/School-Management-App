<!-- resources/views/teachers/edit.blade.php -->
@extends('layouts.master')

@section('title', 'Edit Teacher')

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
                            <li class="breadcrumb-item active">Edit Teacher</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <h1 class="mt-5">Edit Teacher</h1>
                <form action="{{ route('updateTeachers', $teacher) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $teacher->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="teacher_id">Teacher</label>
                        <input type="text" name="teacher_id" id="teacher_id" class="form-control"
                            value="{{ $teacher->teacher_id }}" required>
                    </div>
                    <div class="form-group">
                        <label for="specialization">Specialization</label>
                        <input type="text" name="specialization" id="specialization" class="form-control"
                            value="{{ $teacher->specialization }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                            value="{{ $teacher->phone_number }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ $teacher->address }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ $teacher->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('listTeachers') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
