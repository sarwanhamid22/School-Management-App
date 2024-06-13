<!-- resources/views/grades/edit.blade.php -->
@extends('layouts.master')

@section('title', 'Edit Grade')

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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listGrades') }}">Nilai</a></li>
                            <li class="breadcrumb-item active">Edit Nilai</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container mt-5">
            <h1>Edit Nilai</h1>
            <form action="{{ route('updateGrades', $grade->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="student_name">Nama Siswa <span class="text-danger">*</span></label>
                    <select name="student_name" id="student_name" class="form-control" required>
                        <option selected disabled>Pilih Nama Siswa</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ $student->id == $grade->student_id ? 'selected' : '' }}>
                                {{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="student_id">Nomor Induk Siswa <span class="text-danger">*</span></label>
                    <select name="student_id" id="student_id" class="form-control" required>
                        <option selected disabled>Pilih Nomor Induk Siswa</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ $student->id == $grade->student_id ? 'selected' : '' }}>
                                {{ $student->student_id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="student_class">Kelas <span class="text-danger">*</span></label>
                    <select name="student_class" id="student_class" class="form-control" required>
                        <option selected disabled>Pilih Kelas</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ $student->id == $grade->student_id ? 'selected' : '' }}>
                                {{ $student->class }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subyek <span class="text-danger">*</span></label>
                    <input type="text" name="subject" id="subject" class="form-control" value="{{ $grade->subject }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="grade">Nilai <span class="text-danger">*</span></label>
                    <input type="number" name="grade" id="grade" min="0" max="100" class="form-control"
                        value="{{ $grade->grade }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('listGrades') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
