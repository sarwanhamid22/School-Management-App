<!-- resources/views/teaching_schedules/edit.blade.php -->
@extends('layouts.master')

@section('title', 'Edit Teaching Schedule')

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
                            <li class="breadcrumb-item"><a href="{{ route('listTeachingschedules') }}">Teaching Schedules</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Teaching Schedule</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <h1 class="mt-5">Edit Teaching Schedule</h1>
                <form action="{{ route('updateTeachingschedules', $teachingSchedule->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="teacher_name">Teacher</label>
                        <select name="teacher_name" id="teacher_name" class="form-control">
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"
                                    {{ $teacher->id == $teachingSchedule->teacher_id ? 'selected' : '' }}>
                                    {{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="teacher_id">Teacher ID</label>
                        <select name="teacher_id" id="teacher_id" class="form-control">
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"
                                    {{ $teacher->id == $teachingSchedule->teacher_id ? 'selected' : '' }}>
                                    {{ $teacher->teacher_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control"
                            value="{{ $teachingSchedule->subject }}" required>
                    </div>
                    <div class="form-group">
                        <label for="teaching_day">Teaching Day</label>
                        <select name="teaching_day" id="teaching_day" class="form-control" required>
                            <option value="Monday" {{ $teachingSchedule->teaching_day == 'Monday' ? 'selected' : '' }}>
                                Monday</option>
                            <option value="Tuesday" {{ $teachingSchedule->teaching_day == 'Tuesday' ? 'selected' : '' }}>
                                Tuesday</option>
                            <option value="Wednesday"
                                {{ $teachingSchedule->teaching_day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                            <option value="Thursday" {{ $teachingSchedule->teaching_day == 'Thursday' ? 'selected' : '' }}>
                                Thursday</option>
                            <option value="Friday" {{ $teachingSchedule->teaching_day == 'Friday' ? 'selected' : '' }}>
                                Friday</option>
                            <option value="Saturday" {{ $teachingSchedule->teaching_day == 'Saturday' ? 'selected' : '' }}>
                                Saturday</option>
                            <option value="Sunday" {{ $teachingSchedule->teaching_day == 'Sunday' ? 'selected' : '' }}>
                                Sunday</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input type="time" name="start_time" id="start_time" class="form-control"
                            value="{{ $teachingSchedule->start_time }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input type="time" name="end_time" id="end_time" class="form-control"
                            value="{{ $teachingSchedule->end_time }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('listTeachingschedules') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
