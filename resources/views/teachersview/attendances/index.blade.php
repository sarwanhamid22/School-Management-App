<!-- resources/views/attendances/index.blade.php -->
@extends('teachersview.master')
@php
    use Carbon\Carbon;
@endphp

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <style>
        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .action-buttons a,
        .action-buttons button {
            margin: -6.5px;
        }
    </style>
@endsection

@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    {{-- Script tambahan inisialisasi datatables --}}
    <script>
        $(function() {
            $("#data-table").DataTable();
        })
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
            }).then(function(value) {
                if (value) {
                    // Set form action to the delete URL
                    var form = $('#delete-form');
                    form.attr('action', url);
                    form.submit();
                }
            });
        }
    </script>
@endsection

@section('title', 'Attendances')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Attendances</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Attendances Students SMK Gamelab</h1>
                    <a href="{{ route('createAttendancesview') }}" class="btn btn-primary">Add Attendance</a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover mb-0" id="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student</th>
                                    <th>Student ID</th>
                                    <th>Class</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $attendance->student->name }}</td>
                                        <td>{{ $attendance->student->student_id }}</td>
                                        <td>{{ $attendance->student->class }}</td>
                                        <td>{{ Carbon::parse($attendance->date)->format('d-m-Y') }}</td>
                                        <td>{{ $attendance->status }}</td>
                                        <td class="action-buttons">
                                            <a href="{{ route('showAttendancesview', $attendance) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('editAttendancesview', $attendance) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" onclick="confirmDelete(this)"
                                                data-url="{{ route('deleteAttendancesview', ['attendance' => $attendance->id]) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Form Delete -->
                        <form id="delete-form" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
