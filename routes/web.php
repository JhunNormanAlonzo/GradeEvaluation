<?php

use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectPrerequisiteController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/master', function () {
    return view('admin.index');
});

Route::prefix('admin')->as('admin.')->group(function() {
    Route::resource('/subject-prerequisite', SubjectPrerequisiteController::class)->names('subject.prerequisite');
    Route::resource('/subject', SubjectController::class)->names('subject');
    Route::resource('/semester', SemesterController::class)->names('semester');
    Route::resource('/user', UserController::class)->names('user');
    Route::resource('/year-level', YearLevelController::class)->names('year-level');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
