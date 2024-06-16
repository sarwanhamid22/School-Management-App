<!-- resources/views/payments/show.blade.php -->
@extends('layouts.master')

@section('title', 'Payment Details')
@php
    use Carbon\Carbon;
@endphp

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
                            <li class="breadcrumb-item"><a href="{{ route('listPayments') }}">Students</a></li>
                            <li class="breadcrumb-item active">Payment Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container mt-5">
            <h1 class="mt-5">Payment Details</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{ $payment->student->name }}</td>
                        </tr>
                        <tr>
                            <th>Student ID</th>
                            <td>{{ $payment->student->student_id }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Akademik</th>
                            <td>{{ $payment->academic_year }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td>{{ $payment->status ? 'Lunas' : 'Belum Lunas' }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $payment->description }}</td>
                        </tr>
                    </table>
                    <br>
                    <a href="{{ route('listPayments') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
