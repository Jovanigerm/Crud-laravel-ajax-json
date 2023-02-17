<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/student', [StudentController::class,'index'])->name('/student');
Route::post('/students', [StudentController::class,'store'])->name('/students');
Route::get('/fetch-students', [StudentController::class,'fetchstudents'])->name('/fetch-students');
Route::get('/edit-student/{id}', [StudentController::class,'edit'])->name('/edit-student/{id}');
Route::put('/update-student/{id}', [StudentController::class,'update'])->name('/update-student/{id}');
Route::delete('/delete-student/{id}', [StudentController::class,'destroy'])->name('/delete-student/{id}');
