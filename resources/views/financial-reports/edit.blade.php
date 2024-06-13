@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Laporan Keuangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Laporan Keuangan</li>
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
                            <form method="POST" action="{{ route('financial-reports.update', $financialReport->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Keterangan</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $financialReport->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="expense">Pengeluaran</label>
                                    <input type="number" class="form-control" id="expense" name="expense" value="{{ $financialReport->expense }}" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <label for="income">Pendapatan</label>
                                    <input type="number" class="form-control" id="income" name="income" value="{{ $financialReport->income }}" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control" id="description" name="description">{{ $financialReport->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="report_date">Tanggal</label>
                                    <input type="date" class="form-control" id="report_date" name="report_date" value="{{ $financialReport->report_date->format('Y-m-d') }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
