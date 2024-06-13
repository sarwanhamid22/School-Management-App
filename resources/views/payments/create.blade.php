@extends('layouts.master')
@section('title', 'Form Pembayaran Keuangan')

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
                    <h1 class="m-0">Form Pembayaran Keuangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('payments.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Form Pembayaran Keuangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <p class="text-danger">Bidang yang bertanda * wajib diisi.</p>
                    <form action="{{ route('payments.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="student_id" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                                    <select class="form-control" id="student_id" name="student_id" required>
                                        <option selected disabled>Pilih Nama Siswa</option>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="class" class="form-label">Kelas <span class="text-danger">*</span></label>
                                    <select class="form-control" id="class" name="class" required>
                                        <option selected disabled>Pilih Kelas Siswa</option>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->class }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="academic_year" class="form-label">Tahun Ajaran <span class="text-danger">*</span></label>
                                    <select class="form-control" id="academic_year" name="academic_year" required>
                                        <option selected disabled>Pilih Tahun Ajaran</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024">2023-2024</option>
                                    </select>
                                </div>
                            </div>
                        </div>

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

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
