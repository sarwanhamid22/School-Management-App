<!-- resources/views/attendances/edit.blade.php -->
@extends('layouts.master')

@section('title', 'Edit Attendance')

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
                        <li class="breadcrumb-item"><a href="{{ route('listAttendances') }}">Attendances</a></li>
                        <li class="breadcrumb-item active">Edit Attendance</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container mt-5">
            <h1 class="mt-5">Edit Attendance</h1>
            <form action="{{ route('updateAttendances', $attendance->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="student_id">Student</label>
                    <select name="student_id" id="student_id" class="form-control">
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ $student->id == $attendance->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" value="{{ $attendance->date }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Present" {{ $attendance->status == 'Present' ? 'selected' : '' }}>Present</option>
                        <option value="Absent" {{ $attendance->status == 'Absent' ? 'selected' : '' }}>Absent</option>
                        <option value="Late" {{ $attendance->status == 'Late' ? 'selected' : '' }}>Late</option>
                        <option value="Excused" {{ $attendance->status == 'Excused' ? 'selected' : '' }}>Excused</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('listAttendances') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

