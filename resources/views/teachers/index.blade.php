<!-- resources/views/teachers/index.blade.php -->
@extends('layouts.master')

@section('title', 'Teachers')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <style>
        /* Menambahkan kelas khusus untuk mengatur lebar kolom */
        .col-teacher-id,
        .col-phone-number,
        .col-name,
        .col-specialization,
        .col-address {
            width: 15%;
            text-align: center;
        }

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
                            <li class="breadcrumb-item active">Teachers</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Teachers SMK Gamelab</h1>
                    <div>
                        <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#importModal">Import
                            Excel</button>
                        <a href="{{ route('createTeachers') }}" class="btn btn-primary">Add Teacher</a>
                    </div>
                </div>

                <!-- Import Modal -->
                <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="importModalLabel">Import Teachers Excel File</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('importTeachers') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="excel_file">Choose Excel File</label>
                                        <input type="file" name="excel_file" id="excel_file" accept=".xlsx, .xls"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover mb-0" id="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="col-name">Name</th>
                                    <th class="col-teacher-id">Teacher ID</th>
                                    <th class="col-specialization">Specialization</th>
                                    <th class="col-phone-number">Phone Number</th>
                                    <th class="col-address">Address</th>
                                    <th>Email</th>
                                    <th class="col-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="col-name">{{ $teacher->name }}</td>
                                        <td class="col-teacher-id">{{ $teacher->teacher_id }}</td>
                                        <td class="col-specialization">{{ $teacher->specialization }}</td>
                                        <td class="col-phone-number">{{ $teacher->phone_number }}</td>
                                        <td class="col-address">{{ $teacher->address }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td class="col-actions action-buttons">
                                            <a href="{{ route('showTeachers', $teacher) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('editTeachers', $teacher) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" onclick="confirmDelete(this)"
                                                data-url="{{ route('deleteTeachers', ['teacher' => $teacher->id]) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                            <!-- Form Delete -->
                                            <form id="delete-form" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
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
