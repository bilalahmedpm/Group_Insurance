<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\employee;
use App\legalheir;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BankController;
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
    return view('admin.index');
})->middleware('auth');
Route::middleware(['auth','role'])->group(function () {

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/fetchrate', 'GiRateController@fetchRate')->name('fetchrate');
Route::middleware( [ 'auth'])->group(function () {
        Route::resource('bank', 'BankController');
        Route::resource('user', 'UserController');
        Route::resource('employee', 'EmployeeController');
        Route::post('/fetchbranches', 'BankController@fetchbankbranches')->name('fetchbranches');

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);


    });


