<!-- resources/views/students/index.blade.php -->
@extends('layouts.master')
@php
    use Carbon\Carbon;
@endphp

@section('title', 'Students')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<style>
    .action-buttons {
        display: flex;
        justify-content: space-around;
    }

    .action-buttons a,
    .action-buttons button {
        margin: 0 2px;
    }
</style>
@endsection

@section('addJavascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
{{-- Script tambahan inisialisasi datatables --}}
<script>
    $(function () {
        $("#data-table").DataTable();
    });
</script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    function confirmDelete(button) {
        var url = $(button).data('url');
        swal({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(function (value) {
            if (value) {
                var form = $('#delete-form');
                form.attr('action', url);
                form.submit();
            }
        });
    }
</script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- Optionally, you can add a header title here -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Students</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1> Laporan Evaluasi</h1>
            </div>
            <!-- Data Table -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover mb-0" id="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Laporan</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->user_id }}</td>
                                    <td>{{ $report->report }}</td>
                                    <td>{{ $report->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection