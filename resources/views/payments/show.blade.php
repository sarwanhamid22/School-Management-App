@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Pembayaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('payments.index') }}">Daftar Pembayaran</a></li>
                        <li class="breadcrumb-item active">Detail Pembayaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('payments.print', $payment->id) }}" class="btn btn-primary" target="_blank">
                            <i class="fas fa-print"></i> Cetak 
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Nama Siswa:</th>
                                    <td>{{ $payment->student->name }}</td>
                                </tr>
                                <tr>
                                    <th style="width:50%">kelas Siswa:</th>
                                    <td>{{ $payment->student->class }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Akademik:</th>
                                    <td>{{ $payment->academic_year }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Pembayaran:</th>
                                    <td>{{ implode(', ', $payment->payment_type) }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah:</th>
                                    <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Bayar:</th>
                                    <td>{{ $payment->payment_date->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Status Pembayaran:</th>
                                    <td>{{ $payment->status ? 'Lunas' : 'Belum Lunas' }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi:</th>
                                    <td>{{ $payment->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
