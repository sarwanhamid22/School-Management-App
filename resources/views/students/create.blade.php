<!-- resources/views/students/create.blade.php -->
@extends('layouts.master')

@section('title', 'Add Student')

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
                            <li class="breadcrumb-item"><a href="{{ route('listStudents') }}">Siswa</a></li>
                            <li class="breadcrumb-item active">Tambah Siswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <h1 class="mt-5">Tambah Siswa</h1>
                <form action="{{ route('storeStudents') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Siswa <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="student_id">Nomor Induk Siswa <span class="text-danger">*</span></label>
                        <input type="text" name="student_id" class="form-control" id="student_id" required>
                    </div>
                    <div class="form-group">
                        <label for="class">Kelas <span class="text-danger">*</span></label>
                        <select class="form-control" id="class" name="class" required>
                            <option selected disabled>Pilih Kelas</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Tanggal Kelahiran <span class="text-danger">*</span></label>
                        <input type="date" name="birth_date" class="form-control" id="birth_date" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat <span class="text-danger">*</span></label>
                        <textarea name="address" class="form-control" id="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ route('listStudents') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
