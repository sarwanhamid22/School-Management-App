<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeachingScheduleController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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
    return view('landingpage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index']);

Route::middleware(['auth', 'admin'])->group(function () {

    //report routes

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

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


});

Route::middleware(['auth', 'siswa'])->group(function () {

    //students route
    Route::get('/user/gradestudent', [GradeController::class, 'gradestudent'])->name('listgradeStudents');
    Route::get('/user/indexstudent', [StudentController::class, 'indexstudent'])->name('listindexStudents');
    Route::get('/user/attendancesstudent', [AttendanceController::class, 'attendancesstudent'])->name('listAttendancesstudent');

    //report routes
    Route::get('/user/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
});


Route::middleware(['auth', 'guru'])->group(function () {
    

    // Students Routes
    Route::get('/teachersview/students', [StudentController::class, 'index'])->name('listStudentsview');
    Route::get('/teachersview/student/create', [StudentController::class, 'create'])->name('createStudentsview');
    Route::post('/students', [StudentController::class, 'store'])->name('storeStudentsviews');
    Route::get('/teachersview/students/{student}', [StudentController::class, 'show'])->name('showStudentsviews');
    Route::get('/teachersview/students/{student}/edit', [StudentController::class, 'edit'])->name('editStudentsviews');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('updateStudentsviews');
    Route::delete('/teachersview//students/{student}/delete', [StudentController::class, 'destroy'])->name('deleteStudentsviews');
    Route::post('/students/import', [StudentController::class, 'import'])->name('importStudents');

    //grades route
    Route::get('/teachersview/grades', [GradeController::class, 'index'])->name('listGradesview');
    Route::get('/teachersview/grades/create', [GradeController::class, 'create'])->name('createGradesview');
    Route::post('/grades', [GradeController::class, 'store'])->name('storeGradesview');
    Route::get('/teachersview/grades/{grade}', [GradeController::class, 'show'])->name('showGradesview');
    Route::get('/teachersview/grades/{grade}/edit', [GradeController::class, 'edit'])->name('editGradesview');
    Route::put('/grades/{grade}', [GradeController::class, 'update'])->name('updateGradesview');
    Route::delete('/teachersview//grades/{grade}/delete', [GradeController::class, 'destroy'])->name('deleteGradesview');

    // Attendance Routes
    Route::get('/teachersview/attendances', [AttendanceController::class, 'index'])->name('listAttendancesview');
    Route::get('/teachersview/attendances/create', [AttendanceController::class, 'create'])->name('createAttendancesview');
    Route::post('/attendances', [AttendanceController::class, 'store'])->name('storeAttendancesview');
    Route::get('/teachersview/attendances/{attendance}', [AttendanceController::class, 'show'])->name('showAttendancesview');
    Route::get('/teachersview/attendances/{attendance}/edit', [AttendanceController::class, 'edit'])->name('editAttendancesview');
    Route::put('/attendances/{attendance}', [AttendanceController::class, 'update'])->name('updateAttendancesview');
    Route::delete('/teachersview/attendances/{attendance}/delete', [AttendanceController::class, 'destroy'])->name('deleteAttendancesview');
    Route::post('/attendances/import', [AttendanceController::class, 'import'])->name('importAttendances');

    Route::get('/teachersview/indexschedules', [TeachingScheduleController::class, 'indexschedules'])->name('listschedulesview');

    Route::get('/teachersview/indexteacher', [TeacherController::class, 'indexteacher'])->name('listTeachersview');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__ . '/auth.php';
