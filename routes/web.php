<?php

use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimeLogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('timelog')->group(function () {
    Route::get('/', [TimeLogController::class, 'index']);
    Route::get('/create/{projectId}', [TimeLogController::class, 'create'])->name('timelog.create');
    Route::get('/{projectId}/edit/{timeLogId}', [TimeLogController::class, 'edit'])->name('timelog.edit');
    Route::get('/{projectId}/delete/{timeLogId}', [TimeLogController::class, 'delete'])->name('timelog.delete');

    Route::post('/', [TimeLogController::class, 'add'])->name('timelog.add');
    Route::patch('/', [TimeLogController::class, 'update'])->name('timelog.update');
});

Route::prefix('project')->group(function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('/view/{projectId}', [ProjectController::class, 'show'])->name('project.show');
    Route::get('/create', [ProjectController::class, 'create'])->name('project.create');

    Route::post('/', [ProjectController::class, 'add'])->name('project.add');
});

Route::prefix('freelancer')->group(function () {
    Route::get('/', [FreelancerController::class, 'index']);
    Route::get('/view/{freelancerId}', [FreelancerController::class, 'show'])->name('freelancer.show');
});
