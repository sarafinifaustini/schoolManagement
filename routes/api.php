<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Teacher\TeacherController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('index',UserController::class);

Route::get('/students',[UserController::class,'index']);

Route::get('/classes',[ClassesController::class,'index']);

Route::get('/sections',[SectionController::class,'index']);

// Students Admin Side
Route::delete('student/delete/{student}', [UserController::class, 'destroy']);
Route::delete('students/massDestroy/{students}', [UserController::class, 'massDestroy']);

Route::get('students/export/{students}', [UserController::class, 'export']);
// Teacher Admin Side
Route::get('/teachers',[TeacherController::class,'index']);
Route::delete('teachers/delete/{teacher}', [TeacherController::class, 'destroy']);
Route::delete('teachers/massDestroy/{teachers}', [TeacherController::class, 'massDestroy']);

Route::get('teachers/export/{teachers}', [TeacherController::class, 'export']);
Route::ApiResource('/calendar',CalendarController::class);

Route::get('/sms',[SmsController::class,'index']);

Route::get('/messages',[MessageController::class,'index']);

  Route::post('send/sms',[MessageController::class,'send']);
  Route::get('attendance',[AttendanceController::class,'attendance']);

