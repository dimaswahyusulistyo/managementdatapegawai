<?php
use App\Http\Controllers\PegawaiApiController;
use App\Http\Controllers\StatuspegawaiController;
use App\Http\Controllers\PendidikanApiController;
use App\Http\Controllers\JenispegawaiApiController;
use App\Http\Controllers\JeniskelaminApiController;
use App\Http\Controllers\AgamaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Pegawai Api
Route::get('/tablepegawai', [PegawaiApiController::class, 'indexapi']);
Route::get('/tablepegawai/{id}', [PegawaiApiController::class, 'showapi']);
Route::put('/updatepegawai/{id}', [PegawaiApiController::class, 'updateapi']);
Route::post('/prosesaddpegawai', [PegawaiApiController::class, 'storeapi']);
Route::delete('/destroypegawai/{id}', [PegawaiApiController::class, 'destroyapi']);

// Status Pegawai Api
Route::get('/tablestatuspegawai', [StatuspegawaiController::class, 'indexapi']);
Route::get('/tablestatuspegawai/{id}', [StatuspegawaiController::class, 'showapi']);
Route::post('/prosesaddstatuspegawai', [StatuspegawaiController::class, 'storeapi']);
Route::put('/updatestatuspegawai/{id}', [StatuspegawaiController::class, 'updateapi']);
Route::delete('/destroystatuspegawai/{id}', [StatuspegawaiController::class, 'destroyapi']);

// Agama Api
Route::post('/prosesaddagama', [AgamaApiController::class, 'storeapi']); 
Route::get('/table', [AgamaApiController::class, 'indexapi']);
Route::get('/table/{id}', [AgamaApiController::class, 'showapi']);
Route::get('/editagama{id}', [AgamaApiController::class, 'editapi']); 
Route::put('/updateagama/{id}', [AgamaApiController::class, 'updateapi']); 
Route::delete('/destroyagama/{id}', [AgamaApiController::class, 'destroyapi']); 

// Pendidikan Api
Route::get('/tablependidikan/{id}', [PendidikanApiController::class, 'showapi']); 
Route::post('/prosesaddpendidikan', [PendidikanApiController::class, 'storeapi']); 
Route::get('/tablependidikan', [PendidikanApiController::class, 'indexapi']); 
Route::get('/editpendidikan{id}', [PendidikanApiController::class, 'editapi']); 
Route::put('/updatependidikan/{id}', [PendidikanApiController::class, 'updateapi']); 
Route::delete('/destroypendidikan/{id}', [PendidikanApiController::class, 'destroyapi']); 

// Jenis Pegawai
Route::get('/tablejenispegawai/{id}', [JenispegawaiApiController::class, 'showapi']); 
Route::post('/prosesaddjenispegawai', [JenispegawaiApiController::class, 'storeapi']); 
Route::get('/tablejenispegawai', [JenispegawaiApiController::class, 'indexapi']); 
Route::get('/editjenispegawai{id}', [JenispegawaiApiController::class, 'editapi']); 
Route::put('/updatejenispegawai/{id}', [JenispegawaiApiController::class, 'updateapi']); 
Route::delete('/destroyjenispegawai/{id}', [JenispegawaiApiController::class, 'destroyapi']); 

//Jenis Kelamin
Route::get('/tablejeniskelamin/{id}', [JeniskelaminApiController::class, 'showapi']); 
Route::post('/prosesaddjeniskelamin', [JeniskelaminApiController::class, 'storeapi']); 
Route::get('/tablejeniskelamin', [JeniskelaminApiController::class, 'indexapi']); 
Route::get('/editjeniskelamin{id}', [JeniskelaminApiController::class, 'editapi']); 
Route::put('/updatejeniskelamin/{id}', [JeniskelaminApiController::class, 'updateapi']); 
Route::delete('/destroyjeniskelamin/{id}', [JeniskelaminApiController::class, 'destroyapi']); 