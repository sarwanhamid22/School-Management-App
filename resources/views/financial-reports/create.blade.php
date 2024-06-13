@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Laporan Keuangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tambah Laporan Keuangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-danger">* Wajib diisi</p>
                            <form method="POST" action="{{ route('financial-reports.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Keterangan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="expense">Pengeluaran <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="expense" name="expense" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <label for="income">Pendapatan <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="income" name="income" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="report_date">Tanggal <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="report_date" name="report_date" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
