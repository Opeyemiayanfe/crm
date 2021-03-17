<?php

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
    return view('index');
});

Auth::routes();

//Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//company
Route::get('/company', [App\Http\Controllers\CompaniesController::class, 'index']);

Route::get('/company/create', [App\Http\Controllers\CompaniesController::class, 'create']);

Route::post('/company', [App\Http\Controllers\CompaniesController::class, 'store']);

Route::get('/company/{id}/edit', [App\Http\Controllers\CompaniesController::class, 'edit']);

Route::put('/company/{id}', [App\Http\Controllers\CompaniesController::class, 'update']);

Route::delete('/company/{id}', [App\Http\Controllers\CompaniesController::class, 'destroy']);


//employee
Route::get('/employee', [App\Http\Controllers\EmployeesController::class, 'index']);

Route::get('/employee/create', [App\Http\Controllers\EmployeesController::class, 'create']);

Route::post('/employee', [App\Http\Controllers\EmployeesController::class, 'store']);

Route::get('/employee/{id}/edit', [App\Http\Controllers\EmployeesController::class, 'edit']);

Route::put('/employee/{id}', [App\Http\Controllers\EmployeesController::class, 'update']);

Route::delete('/employee/{id}', [App\Http\Controllers\EmployeesController::class, 'destroy']);
