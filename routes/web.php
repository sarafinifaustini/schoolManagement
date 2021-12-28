<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\User\Auth;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Teacher\TeacherController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () { return view('dashboard.user.login'); });

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');

          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        //   Route::view('/home','dashboard.user.home')->name('home');
        //   Route::view('/attendance','dashboard.user.attendance')->name('attendance');
           Route::get('/home',[UserController::class,'show'])->name('home');
           Route::get('/attendance',[UserController::class,'getAttendance'])->name('attendance');
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
          Route::get('/add-new',[UserController::class,'add'])->name('add');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::view('/newStudent','dashboard.admin.add')->name('newStudent');
        Route::view('/teacher','dashboard.admin.teacherDetails')->name('teacher');
        Route::view('/calendar','dashboard.admin.calendar')->name('calendar');
        Route::post('/addUser',[UserController::class,'addUser'])->name('addUser');
        Route::get('/messageList',[MessageController::class,'index'])->name('messageList');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::post('send/sms',[MessageController::class,'send'])->name('send');

   

});
});

Route::prefix('teacher')->name('teacher.')->group(function(){

       Route::middleware(['guest:teacher','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.Teacher.login')->name('login');
            Route::view('/register','dashboard.Teacher.register')->name('register');
            Route::post('/create',[TeacherController::class,'create'])->name('create');
            Route::post('/check',[TeacherController::class,'check'])->name('check');

       });

       Route::middleware(['auth:teacher','PreventBackHistory'])->group(function(){
        //    Route::view('/home','dashboard.teacher.home')->name('home');
           Route::get('/home',[AttendanceController::class,'index'])->name('home');
           Route::post('/update/{attendance_id}',[AttendanceController::class,'update'])->name('update');
            Route::post('logout',[TeacherController::class,'logout'])->name('logout');

                  // Attendances
    Route::get('home/{year}/{month}', [AttendanceController::class,'index'])
        ->where('year', '20(19|20)')
        ->where('month', '(1[0-2]|0?[1-9])')
        ->name('home');

    //default redirection to current month and redirect if fail above route rules
    Route::get('home/{year?}/{month?}', function () {
        return redirect()->route('teacher.attendances.index', ['year' => now()->year, 'month' => now()->format('m')]);
    })->name('home.redirect');

    Route::post('home/{year}/{month}',  [AttendanceController::class,'store'])
        ->where('year', '20(19|20)')
        ->where('month', '(1[0-2]|0?[1-9])')
        ->name('home.store');

    });
       });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sms',[SmsController::class,'index']);

