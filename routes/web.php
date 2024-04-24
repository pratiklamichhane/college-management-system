<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AssignmentController;

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
    return view('welcome');
});

        Route::group(['middleware' => 'auth'], function()
        {

        Route::resource('departments', DepartmentController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('students', StudentController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('enrollments', EnrollmentController::class);
        Route::resource('assignments', AssignmentController::class);
        Route::get('users/{id}/edit', [LoginController::class, 'edit'])->name('users.edit');
        Route::put('users/{id}', [LoginController::class, 'update'])->name('users.update');
        Route::delete('users/{id}', [LoginController::class, 'destroy'])->name('users.destroy');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('users', [UserController::class, 'index'])->name('users');
        Route::post('register', [LoginController::class, 'register'])->name('register');
        Route::get('register', [LoginController::class, 'registerForm'])->name('registerForm');
        Route::get('profile' , [LoginController::class, 'profile'])->name('profile');
        });


    Route::get('login', [LoginController::class, 'loginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('loginStore');



