<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubDepartmentController;
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

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/widgets', function(){
    return view('admin.widgets.index');
});

Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/tambah_department', [DepartmentController::class, 'create']);
Route::post('/simpan_department', [DepartmentController::class, 'store']);
Route::get('/edit_department/{id}', [DepartmentController::class, 'edit']);
Route::post('/update_department/{id}', [DepartmentController::class, 'update']);
Route::post('/delete_department/{id}', [DepartmentController::class, 'destroy']);
Route::delete('/delete_department_biasa/{id}', [DepartmentController::class, 'destroy_lama']);
Route::post('/department_detail', [DepartmentController::class, 'show']);

Route::get('/sub_department', [SubDepartmentController::class, 'index']);
Route::get('/tambah_sub_department', [SubDepartmentController::class, 'create']);
Route::post('/simpan_sub_department', [SubDepartmentController::class, 'store']);
Route::get('/edit_sub_department/{id}', [SubDepartmentController::class, 'edit']);
Route::post('/update_sub_department/{id}', [SubDepartmentController::class, 'update']);
Route::post('/delete_sub_department/{id}', [SubDepartmentController::class, 'destroy']);
