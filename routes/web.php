<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\SubjectController;

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

























// Route::get('/add_subject', [SubjectController::class, 'index'])->name('add_subject');
// Route::get('/add_stand', [SubjectController::class, 'stand'])->name('add_standard');
// Route::post('/add_subjecy', [SubjectController::class, 'store'])->name('assign_chapter');
// Route::post('/add_subct', [SubjectController::class, 'store'])->name('add_chapter');
// Route::post('/add_subjct', [SubjectController::class, 'store'])->name('assign_subject');
// Route::post('/add_sbject', [SubjectController::class, 'store'])->name('assign_students');
// Route::post('/add_suject', [SubjectController::class, 'store'])->name('view_subjects');
// Route::post('/add_subject', [SubjectController::class, 'store'])->name('view_chapters');
// Route::post('/add_ubject', [SubjectController::class, 'store'])->name('view_standards');
// Route::put('/add_subject/{id}', [SubjectController::class, 'update'])->name('update_subject');
// Route::delete('/add_subject/{id}', [SubjectController::class, 'destroy'])->name('delete_subject');



