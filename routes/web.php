<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TeachingScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


// Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Student Routes
Route::get('/students', [StudentController::class, 'index'])->name('listStudents');
Route::get('/students/create', [StudentController::class, 'create'])->name('createStudents');
Route::post('/students', [StudentController::class, 'store'])->name('storeStudents');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('showStudents');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('editStudents');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('updateStudents');
Route::delete('/students/{student}/delete', [StudentController::class, 'destroy'])->name('deleteStudents');
Route::post('/students/import', [StudentController::class, 'import'])->name('importStudents');


// Teacher Routes
Route::get('/teachers', [TeacherController::class, 'index'])->name('listTeachers');
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('createTeachers');
Route::post('/teachers', [TeacherController::class, 'store'])->name('storeTeachers');
Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('showTeachers');
Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('editTeachers');
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('updateTeachers');
Route::delete('/teachers/{teacher}/delete', [TeacherController::class, 'destroy'])->name('deleteTeachers');

<<<<<<< Updated upstream
// Attendance Routes
Route::get('/attendances', [AttendanceController::class, 'index'])->name('listAttendances');
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('createAttendances');
Route::post('/attendances', [AttendanceController::class, 'store'])->name('storeAttendances');
Route::get('/attendances/{attendance}', [AttendanceController::class, 'show'])->name('showAttendances');
Route::get('/attendances/{attendance}/edit', [AttendanceController::class, 'edit'])->name('editAttendances');
Route::put('/attendances/{attendance}', [AttendanceController::class, 'update'])->name('updateAttendances');
Route::delete('/attendances/{attendance}/delete', [AttendanceController::class, 'destroy'])->name('deleteAttendances');
Route::post('/attendances/import', [AttendanceController::class, 'import'])->name('importAttendances');

// Grade Routes
Route::get('/grades', [GradeController::class, 'index'])->name('listGrades');
Route::get('/grades/create', [GradeController::class, 'create'])->name('createGrades');
Route::post('/grades', [GradeController::class, 'store'])->name('storeGrades');
Route::get('/grades/{grade}', [GradeController::class, 'show'])->name('showGrades');
Route::get('/grades/{grade}/edit', [GradeController::class, 'edit'])->name('editGrades');
Route::put('/grades/{grade}', [GradeController::class, 'update'])->name('updateGrades');
Route::delete('/grades/{grade}/delete', [GradeController::class, 'destroy'])->name('deleteGrades');

// Teaching Schedule Routes
Route::get('/teaching_schedules', [TeachingScheduleController::class, 'index'])->name('listTeachingschedules');
Route::get('/teaching_schedules/create', [TeachingScheduleController::class, 'create'])->name('createTeachingschedules');
Route::post('/teaching_schedules', [TeachingScheduleController::class, 'store'])->name('storeTeachingschedules');
Route::get('/teaching_schedules/{teaching_schedule}', [TeachingScheduleController::class, 'show'])->name('showTeachingschedules');
Route::get('/teaching_schedules/{teaching_schedule}/edit', [TeachingScheduleController::class, 'edit'])->name('editTeachingschedules');
Route::put('/teaching_schedules/{teaching_schedule}', [TeachingScheduleController::class, 'update'])->name('updateTeachingschedules');
Route::delete('/teaching_schedules/{teaching_schedule}/delete', [TeachingScheduleController::class, 'destroy'])->name('deleteTeachingschedules');
=======
// Payment Routes
Route::get('payments/trashed', [PaymentController::class, 'trashed'])->name('payments.trashed');
Route::get('/payments/search', 'PaymentController@search')->name('payments.search');

Route::post('payments/{id}/restore', [PaymentController::class, 'restore'])->name('payments.restore');
Route::delete('payments/{id}/force-delete', [PaymentController::class, 'forceDelete'])->name('payments.forceDelete');
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payments.show');
Route::get('/payments/print/{id}', [PaymentController::class, 'print'])->name('payments.print');
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');


>>>>>>> Stashed changes
