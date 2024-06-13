@extends('layouts.master')
@section('title', 'Edit Pembayaran Keuangan')

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
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Pembayaran Keuangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('payments.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Pembayaran Keuangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="student_id" class="form-label">Nama Siswa</label>
                                    <select class="form-control" id="student_id" name="student_id">
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}" {{ $student->id == $payment->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="class" class="form-label">Kelas</label>
                                    <select class="form-control" id="class" name="class">
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}" {{ $student->id == $payment->student_id ? 'selected' : '' }}>{{ $student->class }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="academic_year" class="form-label">Tahun Ajaran</label>
                                    <select class="form-control" id="academic_year" name="academic_year">
                                        <option value="2022-2023" {{ $payment->academic_year == '2022-2023' ? 'selected' : '' }}>2022-2023</option>
                                        <option value="2023-2024" {{ $payment->academic_year == '2023-2024' ? 'selected' : '' }}>2023-2024</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Pembayaran</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="payment_type[]" value="spp" id="spp" {{ in_array('spp', $payment->payment_type) ? 'checked' : '' }}>
                                <label class="form-check-label" for="spp">SPP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="payment_type[]" value="gedung" id="gedung" {{ in_array('gedung', $payment->payment_type) ? 'checked' : '' }}>
                                <label class="form-check-label" for="gedung">Gedung</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="payment_type[]" value="buku" id="buku" {{ in_array('buku', $payment->payment_type) ? 'checked' : '' }}>
                                <label class="form-check-label" for="buku">Buku</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="payment_type[]" value="seragam" id="seragam" {{ in_array('seragam', $payment->payment_type) ? 'checked' : '' }}>
                                <label class="form-check-label" for="seragam">Seragam</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah Uang</label>
                            <input type="number" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}" placeholder="Masukkan jumlah uang">
                        </div>

                        <div class="mb-3">
                            <label for="payment_date" class="form-label">Tanggal Bayar</label>
                            <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ $payment->payment_date->format('Y-m-d') }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Pembayaran</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1" {{ $payment->status ? 'selected' : '' }}>Lunas</option>
                                <option value="0" {{ !$payment->status ? 'selected' : '' }}>Belum Lunas</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Masukkan deskripsi">{{ $payment->description }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Perbarui Pembayaran</button>
                            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
