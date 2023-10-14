<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CurriculumnController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectPrerequisiteController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearLevelController;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        $role = Auth::user()->getRoleNames()->first();
        if ($role == "Admin") {
            return redirect()->route('admin.dashboard.index');
        } else if ($role == "Teacher") {
            dd("wala pa");
        } else if ($role == "Student") {
            dd("wala pa");
        }
    } else {
        return view('welcome');
    }
});


Auth::routes();

Route::get('/master', function () {
    return view('admin.index');
});

Route::prefix('admin')->as('admin.')->group(function () {

    Route::resource('/dashboard', AdminDashboardController::class)->names('dashboard');
    Route::resource('/subject-prerequisite', SubjectPrerequisiteController::class)->names('subject.prerequisite');
    Route::resource('/subject', SubjectController::class)->names('subject');
    Route::resource('/student', StudentController::class)->names('student');
    Route::resource('/teacher', TeacherController::class)->names('teacher');
    Route::resource('/section', SectionController::class)->names('section');
    Route::resource('/curriculumn', CurriculumnController::class)->names('curriculumn');
    Route::resource('/semester', SemesterController::class)->names('semester');
    Route::resource('/user', UserController::class)->names('user');
    Route::resource('/year-level', YearLevelController::class)->names('year-level');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
