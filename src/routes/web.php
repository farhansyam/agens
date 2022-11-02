<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NotifController;
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
    return view('auth.login');
});


//kolam
//kolam create
Route::post('kolam/set',[FirebaseController::class, 'set'])->middleware('auth');
Route::get('kolam/create',[FirebaseController::class, 'create'])->middleware('auth');
//kolam delete
Route::get('kolam/delete/{namaKolam}',[FirebaseController::class, 'delete'])->middleware('auth');
//kolam read
Route::get('read',[FirebaseController::class, 'read']);
// Route::get('dashboard/{namaKolam}',[FirebaseController::class, 'detail'])->middleware('auth');
Route::get('kolam/detail/{namaKolam}',[FirebaseController::class, 'detailApi'])->middleware('auth');
// kolam edit
Route::get('kolam/edit/{kodeKolam}',[FirebaseController::class, 'edit'])->middleware('auth');
Route::post('kolam/setupdate',[FirebaseController::class, 'update'])->middleware('auth');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\FirebaseController::class, 'read'])->name('home')->middleware('auth');

// Notif
Route::get('/notif-oxy', [FirebaseController::class, 'notifOxy'])->name('fcmToken');
Route::get('/notif-keruh',[FirebaseController::class,'notifKeruh'])->name('notification');
Route::get('/notif-ph',[FirebaseController::class,'notifPh'])->name('notification');
Route::get('/notif-suhu',[FirebaseController::class,'notifTemp'])->name('notification');
Route::get('setnotif',[NotifController::class, 'set'])->middleware('auth');
Route::patch('/fcm-token', [FirebaseController::class, 'updateToken'])->name('fcmToken');


// Logs
Route::get('/log', [LogController::class,'listkolam'])->name('log')->middleware('auth');
Route::get('/log/{kolam}', [LogController::class,'index'])->name('kolam')->middleware('auth');

Route::get('/profile/{user}', [UserController::class,'get'])->name('profile')->middleware('auth');

Route::get('/info', [InfoController::class,'get'])->name('info')->middleware('auth');
Route::get('/profile', [UserController::class,'profile'])->name('profile')->middleware('auth');
Route::patch('/profile/update', [UserController::class,'update'])->name('update')->middleware('auth');