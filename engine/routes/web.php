<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JenispegawaiController;
use App\Http\Controllers\StatuspegawaiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\JeniskelaminController;
use App\Http\Controllers\AuthController;

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

Route::get('/hello', function () {
    return view('Hello World');
});

Route::get('/hello-world', [HelloWorldController::class, 'showHelloWorld']);
Route::get('/book', [BookController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::middleware(['auth'])->group(function () {

//Pegawai
Route::get('/formpegawai', [PegawaiController::class, 'create'])->name('dimas-app.createpegawai');
Route::post('/prosesaddpegawai', [PegawaiController::class, 'store'])->name('dimas-app.storepegawai');
Route::get('/tablepegawai', [PegawaiController::class, 'index'])->name('dimas-app.tablepegawai');
Route::get('/editpegawai{id}', [PegawaiController::class, 'edit'])->name('dimas-app.editpegawai');
Route::put('/updatepegawai/{id}', [PegawaiController::class, 'update'])->name('dimas-app.updatepegawai');
Route::delete('/destroypegawai/{id}', [PegawaiController::class, 'destroy'])->name('dimas-app.destroypegawai');

//Agama
Route::get('/form', [TableController::class, 'create'])->name('dimas-app.createagama');
Route::post('/prosesaddagama', [TableController::class, 'store'])->name('dimas-app.storeagama'); 
Route::get('/table', [TableController::class, 'index'])->name('dimas-app.table');
Route::get('/editagama{id}', [TableController::class, 'edit'])->name('dimas-app.editagama'); 
Route::put('/updateagama/{id}', [TableController::class, 'update'])->name('dimas-app.updateagama'); 
Route::delete('/destroyagama/{id}', [TableController::class, 'destroy'])->name('dimas-app.destroyagama'); 

//Jenis Pegawai
Route::get('/formjenispegawai', [JenispegawaiController::class, 'create'])->name('dimas-app.createjenispegawai'); 
Route::post('/prosesaddjenispegawai', [JenispegawaiController::class, 'store'])->name('dimas-app.storejenispegawai'); 
Route::get('/tablejenispegawai', [JenispegawaiController::class, 'index'])->name('dimas-app.tablejenispegawai'); 
Route::get('/editjenispegawai{id}', [JenispegawaiController::class, 'edit'])->name('dimas-app.editjenispegawai'); 
Route::put('/updatejenispegawai/{id}', [JenispegawaiController::class, 'update'])->name('dimas-app.updatejenispegawai'); 
Route::delete('/destroyjenispegawai/{id}', [JenispegawaiController::class, 'destroy'])->name('dimas-app.destroyjenispegawai'); 

//Status Pegawai
Route::get('/formstatuspegawai', [StatuspegawaiController::class, 'create'])->name('dimas-app.createstatuspegawai'); 
Route::post('/prosesaddstatuspegawai', [StatuspegawaiController::class, 'store'])->name('dimas-app.storestatuspegawai'); 
Route::get('/tablestatuspegawai', [StatuspegawaiController::class, 'index'])->name('dimas-app.tablestatuspegawai'); 
Route::get('/editstatuspegawai{id}', [StatuspegawaiController::class, 'edit'])->name('dimas-app.editstatuspegawai'); 
Route::put('/updatestatuspegawai/{id}', [StatuspegawaiController::class, 'update'])->name('dimas-app.updatestatuspegawai'); 
Route::delete('/destroystatuspegawai/{id}', [StatuspegawaiController::class, 'destroy'])->name('dimas-app.destroystatuspegawai');

//Pendidikan
Route::get('/formpendidikan', [PendidikanController::class, 'create'])->name('dimas-app.creatependidikan'); 
Route::post('/prosesaddpendidikan', [PendidikanController::class, 'store'])->name('dimas-app.storependidikan'); 
Route::get('/tablependidikan', [PendidikanController::class, 'index'])->name('dimas-app.tablependidikan'); 
Route::get('/editpendidikan{id}', [PendidikanController::class, 'edit'])->name('dimas-app.editpendidikan'); 
Route::put('/updatependidikan/{id}', [PendidikanController::class, 'update'])->name('dimas-app.updatependidikan'); 
Route::delete('/destroypendidikan/{id}', [PendidikanController::class, 'destroy'])->name('dimas-app.destroypendidikan'); 

//Jenis Kelamin
Route::get('/formjeniskelamin', [JeniskelaminController::class, 'create'])->name('dimas-app.createjeniskelamin'); 
Route::post('/prosesaddjeniskelamin', [JeniskelaminController::class, 'store'])->name('dimas-app.storejeniskelamin'); 
Route::get('/tablejeniskelamin', [JeniskelaminController::class, 'index'])->name('dimas-app.tablejeniskelamin'); 
Route::get('/editjeniskelamin{id}', [JeniskelaminController::class, 'edit'])->name('dimas-app.editjeniskelamin'); 
Route::put('/updatejeniskelamin/{id}', [JeniskelaminController::class, 'update'])->name('dimas-app.updatejeniskelamin'); 
Route::delete('/destroyjeniskelamin/{id}', [JeniskelaminController::class, 'destroy'])->name('dimas-app.destroyjeniskelamin'); 

});
//Login
Route::get('/login', [AuthController::class, 'index'])->name('dimas-app.login'); 
Route::get('/logout', [AuthController::class, 'logout']); 
Route::get('/register', [AuthController::class, 'create'])->name('dimas-app.createregister');
Route::post('/adduser', [AuthController::class, 'store']); 
Route::post('/proseslogin', [AuthController::class, 'authuser']); 