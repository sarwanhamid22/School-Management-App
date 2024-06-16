<!-- resources/views/payments/create.blade.php -->
@extends('layouts.master')

@section('title', 'Add Payment')

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
                            <li class="breadcrumb-item"><a href="{{ route('listPayments') }}">Payments</a></li>
                            <li class="breadcrumb-item active">Add Payment</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <h1 class="mt-5">Add Payment</h1>
                <p class="text-danger">Bidang yang bertanda * wajib diisi.</p>
                <form action="{{ route('storePayments') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="student_name" class="form-label">Name <span class="text-danger">*</span></label>
                        <select class="form-control" id="student_name" name="student_name" required>
                            <option selected disabled>Choose Student Name</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="student_id" class="form-label">Student ID <span class="text-danger">*</span></label>
                        <select class="form-control" id="student_id" name="student_id" required>
                            <option selected disabled>Choose Student ID</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->student_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="text" name="class" class="form-control" id="class" required>
                    </div>
                    <div class="form-group">
                        <label for="academic_year" class="form-label">Tahun Ajaran <span class="text-danger">*</span></label>
                                    <select class="form-control" id="academic_year" name="academic_year" required>
                                        <option selected disabled>Pilih Tahun Ajaran</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024">2023-2024</option>
                                    </select>
                    </div>
                    <div class="form-group">
                    <div class="mb-3">
                        <label class="form-label">Jenis Pembayaran <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_type[]" value="spp" id="spp" required>
                            <label class="form-check-label" for="spp">SPP</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_type[]" value="gedung" id="gedung">
                            <label class="form-check-label" for="gedung">Gedung</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_type[]" value="buku" id="buku">
                            <label class="form-check-label" for="buku">Buku</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_type[]" value="seragam" id="seragam">
                            <label class="form-check-label" for="seragam">Seragam</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah Uang <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Masukkan jumlah uang" required>
                    </div>

                    <div class="mb-3">
                        <label for="payment_date" class="form-label">Tanggal Bayar <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Pembayaran <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1">Lunas</option>
                            <option value="0">Belum Lunas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" placeholder="Masukkan deskripsi" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{ route('listPayments') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
