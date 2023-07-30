<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController;

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
    return view('AddStudent');
});
Route::get('/', [myController::class, 'dynamicDropdown']);
Route::get('/AddStudent', [myController::class, 'dynamicDropdown']);
Route::get('/get_country_wise_visa_type/{id}', [myController::class, 'country_wise_visa_type']);
Route::post('/AddStudent', [myController::class, 'addStudent']);
Route::get('/view_all_visa', [myController::class, 'view_all_visa']);


