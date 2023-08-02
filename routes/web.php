<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\AssignChapterController;
use App\Http\Controllers\AssignStudentController;
use App\Http\Controllers\AssignSubjectController;

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
    return view('login');
})->name('index');
Route::post('/login', [AccessController::class, 'login'])->name('login.submit');

Route::post('/register', [AccessController::class, 'register'])->name('register.submit');

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::get('/logout', [AccessController::class, 'logout'])->name('logout');



Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::post('/subjects', [SubjectController::class,'store'])->name('subjects.store');
Route::post('/subjects/edit/{id}', [SubjectController::class ,'update'])->name('subjects.update');
Route::post('/subjects/delete/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

// Chapters routes
Route::get('/chapters', [ChapterController::class,'index'])->name('chapters.index');
Route::post('/chapters', [ChapterController::class,'store'])->name('chapters.store');
Route::post('/chapters/edit/{id}', [ChapterController::class,'update'])->name('chapters.update');
Route::post('/chapters/delete/{id}', [ChapterController::class,'destroy'])->name('chapters.destroy');

// Standards routes
Route::get('/standards', [StandardController::class, 'index'])->name('standards.index');
Route::post('/standards', [StandardController::class, 'store'])->name('standards.store');
Route::post('/standards/edit/{id}', [StandardController::class, 'update'])->name('standards.update');
Route::post('/standards/delete/{id}', [StandardController::class, 'destroy'])->name('standards.destroy');


Route::get('/assign_chapters', [AssignChapterController::class, 'index'])->name('assign_chapters');
Route::post('/assign_chapters', [AssignChapterController::class, 'assign'])->name('assign_chapters.submit');


Route::get('/assign_subjects', [AssignSubjectController::class, 'index'])->name('assign_subjects');
Route::post('/assign_subjects', [AssignSubjectController::class, 'assign'])->name('assign_subjects.submit');


Route::get('/assign_students', [AssignStudentController::class, 'index'])->name('assign_students');
Route::post('/assign_students', [AssignStudentController::class, 'assign'])->name('assign_students.submit');


























