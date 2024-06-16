<!-- resources/views/teaching_schedules/show.blade.php -->
@extends('layouts.master')

@section('title', 'View Teaching Schedule')
@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listTeachingschedules') }}">Teaching Schedules</a>
                            </li>
                            <li class="breadcrumb-item active">Teaching Schedules Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <h1 class="mt-5">Teaching Schedules Details</h1>
                <div class="card bg-white">
                    <div class="card-body">
                        <table class="table table-bordered bg-white">
                            <tr>
                                <th>Teacher</th>
                                <td>{{ $teachingSchedule->teacher->name }}</td>
                            </tr>
                            <tr>
                                <th>Teacher ID</th>
                                <td>{{ $teachingSchedule->teacher->teacher_id }}</td>
                            </tr>
                            <tr>
                                <th>Subject</th>
                                <td>{{ $teachingSchedule->subject }}</td>
                            </tr>
                            <tr>
                                <th>Teaching Day</th>
                                <td>{{ $teachingSchedule->teaching_day }}</td>
                            </tr>
                            <tr>
                                <th>Start Time</th>
                                <td>{{ Carbon::parse($teachingSchedule->start_time)->format('H:i') }}</td>
                            </tr>
                            <tr>
                                <th>End Time</th>
                                <td>{{ Carbon::parse($teachingSchedule->end_time)->format('H:i') }}</td>
                            </tr>
                        </table>
                        <br>
                        <a href="{{ route('listTeachingschedules') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
