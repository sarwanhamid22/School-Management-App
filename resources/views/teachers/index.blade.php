<!-- resources/views/teachers/index.blade.php -->
@extends('layouts.master')

@section('title', 'Teachers')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
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
                <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
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
                <a href="{{ route('createTeachers') }}" class="btn btn-primary">Add Teacher</a>
            </div>
        
            <div class="card">
                <div class="card-body">
                  <table class="table table-hover mb-0" id="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td> {{ $loop->index + 1}}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->specialization }}</td>
                                <td>{{ $teacher->phone_number }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>
                                    <a href="{{ route('showTeachers', $teacher) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('editTeachers', $teacher) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" onclick="confirmDelete(this)" data-url="{{ route('deleteTeachers', ['teacher' => $teacher->id]) }}" class="btn btn-danger btn-sm">Delete</a>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
