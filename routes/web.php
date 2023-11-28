<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth:sanctum', 'universitas'])->get('/user', [UserController::class,'index']);
Route::middleware(['auth:sanctum', 'universitas'])->get('/user/create', [UserController::class,'create']);
Route::middleware(['auth:sanctum', 'universitas'])->post('/user/store', [UserController::class,'store']);
Route::middleware(['auth:sanctum', 'universitas'])->get('/user/edit/{id}', [UserController::class,'edit']);
Route::middleware(['auth:sanctum', 'universitas'])->post('/user/update/{id}', [UserController::class,'update']);
Route::middleware(['auth:sanctum', 'universitas'])->get('/user/editpassword/{id}', [UserController::class,'editpassword']);
Route::middleware(['auth:sanctum', 'universitas'])->post('/user/updatepassword/{id}', [UserController::class,'updatepassword']);
Route::middleware(['auth:sanctum', 'universitas'])->post('/user/destroy/{id}', [UserController::class,'destroy']);

Route::middleware(['auth:sanctum', 'universitas'])->get('/fakultas',[FakultasController::class,'index'])->name('fakultas');
Route::middleware(['auth:sanctum', 'universitas'])->get('/fakultas/create',[FakultasController::class,'create']);
Route::middleware(['auth:sanctum', 'universitas'])->post('/fakultas/store',[FakultasController::class,'store']);
Route::middleware(['auth:sanctum', 'universitas'])->get('/fakultas/edit/{id}',[FakultasController::class,'edit']);
Route::middleware(['auth:sanctum', 'universitas'])->post('/fakultas/update/{id}',[FakultasController::class,'update']);
Route::middleware(['auth:sanctum', 'universitas'])->post('/fakultas/destroy/{id}',[FakultasController::class,'destroy']);

Route::middleware(['auth:sanctum', 'universitas'])->get('/prodi',[ProdiController::class,'index']);
Route::middleware(['auth:sanctum', 'universitas'])->get('/prodi/create',[ProdiController::class,'create']);
Route::middleware(['auth:sanctum', 'universitas'])->post('/prodi/store',[ProdiController::class,'store']);
Route::middleware(['auth:sanctum', 'universitas'])->get('/prodi/edit/{id}',[ProdiController::class,'edit']);
Route::middleware(['auth:sanctum', 'universitas'])->post('/prodi/update/{id}',[ProdiController::class,'update']);
Route::middleware(['auth:sanctum', 'universitas'])->post('/prodi/destroy/{id}',[ProdiController::class,'destroy']);