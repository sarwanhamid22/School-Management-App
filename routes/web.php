<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TeachingScheduleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\StudentLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Let's make something great!
|
*/

Route::get('login', function () {
    return view('login');
});

Route::middleware('auth:student')->group(function () {
    // Route untuk form login siswa
    Route::get('student/login', [StudentLoginController::class, 'showLoginForm'])->name('student.login');
    Route::post('student/login', [StudentLoginController::class, 'login'])->name('student.login.submit');

    // Route untuk Komunikasi
    Route::get('/', 'MessagesController@index')->name(config('chatify.routes.prefix'));
    Route::post('/idInfo', 'MessagesController@idFetchData');
    Route::post('/sendMessage', 'MessagesController@send')->name('send.message');
    Route::post('/fetchMessages', 'MessagesController@fetch')->name('fetch.messages');
    Route::get('/download/{fileName}', 'MessagesController@download')->name(config('chatify.attachments.download_route_name'));
    Route::post('/chat/auth', 'MessagesController@pusherAuth')->name('pusher.auth');
    Route::post('/makeSeen', 'MessagesController@seen')->name('messages.seen');
    Route::get('/getContacts', 'MessagesController@getContacts')->name('contacts.get');
    Route::post('/updateContacts', 'MessagesController@updateContactItem')->name('contacts.update');
    Route::post('/star', 'MessagesController@favorite')->name('star');
    Route::post('/favorites', 'MessagesController@getFavorites')->name('favorites');
    Route::get('/search', 'MessagesController@search')->name('search');
    Route::post('/shared', 'MessagesController@sharedPhotos')->name('shared');
    Route::post('/deleteConversation', 'MessagesController@deleteConversation')->name('conversation.delete');
    Route::post('/deleteMessage', 'MessagesController@deleteMessage')->name('message.delete');
    Route::post('/updateSettings', 'MessagesController@updateSettings')->name('avatar.update');
    Route::post('/setActiveStatus', 'MessagesController@setActiveStatus')->name('activeStatus.set');
    Route::get('/group/{id}', 'MessagesController@index')->name('group');
    Route::get('/{id}', 'MessagesController@index')->name('user');


    // Route untuk dashboard 
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/notification/store', [HomeController::class, 'storeNotification'])->name('store.notification');
    Route::delete('/notification/{id}', [HomeController::class, 'deleteNotification'])->name('delete.notification');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events', [EventController::class, 'fetchEvents'])->name('events.fetch');
    Route::delete('/events/delete-all', [EventController::class, 'deleteAllEvents'])->name('events.delete.all');

    // Route untuk siswa setelah login
    // Route::get('student/dashboard', [HomeController::class, 'index'])->name('student.dashboard');

    // Route untuk manajemen siswa
    Route::get('/students', [StudentController::class, 'index'])->name('listStudents');
    Route::get('/students/create', [StudentController::class, 'create'])->name('createStudents');
    Route::post('/students', [StudentController::class, 'store'])->name('storeStudents');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('showStudents');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('editStudents');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('updateStudents');
    Route::delete('/students/{student}/delete', [StudentController::class, 'destroy'])->name('deleteStudents');
    Route::post('/students/importStudents', [StudentController::class, 'importStudents'])->name('importStudents');

    // Route untuk manajemen guru
    Route::get('/teachers', [TeacherController::class, 'index'])->name('listTeachers');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('createTeachers');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('storeTeachers');
    Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('showTeachers');
    Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('editTeachers');
    Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('updateTeachers');
    Route::delete('/teachers/{teacher}/delete', [TeacherController::class, 'destroy'])->name('deleteTeachers');
    Route::post('/teachers/importTeachers', [TeacherController::class, 'importTeachers'])->name('importTeachers');

    // Route untuk manajemen kehadiran
    Route::get('/attendances', [AttendanceController::class, 'index'])->name('listAttendances');
    Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('createAttendances');
    Route::post('/attendances', [AttendanceController::class, 'store'])->name('storeAttendances');
    Route::get('/attendances/{attendance}', [AttendanceController::class, 'show'])->name('showAttendances');
    Route::get('/attendances/{attendance}/edit', [AttendanceController::class, 'edit'])->name('editAttendances');
    Route::put('/attendances/{attendance}', [AttendanceController::class, 'update'])->name('updateAttendances');
    Route::delete('/attendances/{attendance}/delete', [AttendanceController::class, 'destroy'])->name('deleteAttendances');

    // Route untuk manajemen nilai
    Route::get('/grades', [GradeController::class, 'index'])->name('listGrades');
    Route::get('/grades/create', [GradeController::class, 'create'])->name('createGrades');
    Route::post('/grades', [GradeController::class, 'store'])->name('storeGrades');
    Route::get('/grades/{grade}', [GradeController::class, 'show'])->name('showGrades');
    Route::get('/grades/{grade}/edit', [GradeController::class, 'edit'])->name('editGrades');
    Route::put('/grades/{grade}', [GradeController::class, 'update'])->name('updateGrades');
    Route::delete('/grades/{grade}/delete', [GradeController::class, 'destroy'])->name('deleteGrades');

    // Route untuk jadwal mengajar
    Route::get('/teaching_schedules', [TeachingScheduleController::class, 'index'])->name('listTeachingschedules');
    Route::get('/teaching_schedules/create', [TeachingScheduleController::class, 'create'])->name('createTeachingschedules');
    Route::post('/teaching_schedules', [TeachingScheduleController::class, 'store'])->name('storeTeachingschedules');
    Route::get('/teaching_schedules/{teaching_schedule}', [TeachingScheduleController::class, 'show'])->name('showTeachingschedules');
    Route::get('/teaching_schedules/{teaching_schedule}/edit', [TeachingScheduleController::class, 'edit'])->name('editTeachingschedules');
    Route::put('/teaching_schedules/{teaching_schedule}', [TeachingScheduleController::class, 'update'])->name('updateTeachingschedules');
    Route::delete('/teaching_schedules/{teaching_schedule}/delete', [TeachingScheduleController::class, 'destroy'])->name('deleteTeachingschedules');

    // Route untuk manajemen pembayaran
    Route::get('/payments', [PaymentController::class, 'index'])->name('listPayments');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('createPayments');
    Route::post('/payments', [PaymentController::class, 'store'])->name('storePayments');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('showPayments');
    Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('editPayments');
    Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('updatePayments');
    Route::delete('/payments/{payment}/delete', [PaymentController::class, 'destroy'])->name('deletePayments');
});


require __DIR__.'/auth.php';
