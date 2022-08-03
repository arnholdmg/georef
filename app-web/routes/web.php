<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageHandler;

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
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [PageHandler::class, 'home'])->name('home');
    Route::get('/area', [PageHandler::class, 'area'])->name('area');
    Route::get('/area/create', [PageHandler::class, 'areaCreate'])->name('area.create');
    Route::get('/area/{area}', [PageHandler::class, 'areaUpdate'])->name('area.update');
    Route::get('/group', [PageHandler::class, 'group'])->name('group');
    Route::get('/group/create', [PageHandler::class, 'groupCreate'])->name('group.create');
    Route::get('/group/{group}', [PageHandler::class, 'groupUpdate'])->name('group.update');
    Route::get('/patient', [PageHandler::class, 'patient'])->name('patient');
    Route::get('/patient/create', [PageHandler::class, 'patientCreate'])->name('patient.create');
    Route::get('/patient/{patient}', [PageHandler::class, 'patientUpdate'])->name('patient.update');
    Route::get('/user', [PageHandler::class, 'user'])->name('user');
    Route::get('/user/create', [PageHandler::class, 'userCreate'])->name('user.create');
    Route::get('/user/{user}', [PageHandler::class, 'userUpdate'])->name('user.update');
});