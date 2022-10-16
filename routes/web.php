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
Route::post('/fetchrate', 'GiRateController@fetchRate')->name('fetchrate'); //Calculate Amount route
Route::post('addmore', 'GiRateController@addMore')->name('addmore');

Route::middleware( [ 'auth'])->group(function () {
    Route::resource('bank', 'BankController');
    Route::resource('branch', 'BranchesController');
    Route::post('/fetchbranches', 'BankController@fetchbankbranches')->name('fetchbranches'); // fetch bank branches route
    Route::resource('user', 'UserController');
    Route::resource('employee', 'EmployeeController');
//retirement routes
    Route::get('/retirement/index', 'EmployeeController@retirementindex')->name('retirement.index'); //index
    Route::get('/retirement', 'EmployeeController@retirement')->name('entry.retirement');            //create
    Route::post('/retirement/store', 'EmployeeController@retirement_store')->name('retirement.store');  //store
    Route::get('/retirement/edit/{id}', 'EmployeeController@retirement_edit')->name('retirement.edit'); //edit
    Route::post('/retirement/update/{id}', 'EmployeeController@retirement_update')->name('retirement.update'); //update
//death routes
    Route::get('/death/index', 'EmployeeController@deathIndex')->name('death.index');
    Route::get('/death', 'EmployeeController@death')->name('entry.death');
    Route::post('/death/store', 'EmployeeController@deathstore')->name('death.store');
    Route::get('/death/edit/{id}', 'EmployeeController@death_edit')->name('death.edit'); //edit
// Death after retirement Routes
    Route::get('/death/after/index', 'EmployeeController@deathafterIndex')->name('death.after.index');
    Route::get('/death_after_retirement', 'EmployeeController@death_after_retirement')->name('entry.death_after_retirement');
    Route::get('/death_after_retirement/store', 'EmployeeController@deathRetirementStore')->name('death_after_retirement.store');
    Route::get('/death/after/edit/{id}', 'EmployeeController@death_after_edit')->name('death.after.edit'); //edit

//Single Case views
    Route::get('/retirement/{id}', 'EmployeeController@retirement_view')->name('retirement.view');
    Route::get('/death/{id}', 'EmployeeController@deathview')->name('death.view');
    Route::get('/death/after/{id}', 'EmployeeController@deathafterview')->name('death.after.view');



//        Route::resource('roles', RoleController::class);
//        Route::resource('users', UserController::class);

    });

    // duplicate checking
    Route::post('/pno_checking', 'EmployeeController@pnocheck')->name('pno.check');
//    Route::post('/cnic_checking', 'EmployeeController@cniccheck')->name('cnic.check');

//  Reports

Route::get('/department', 'EmployeeController@department_report')->name('department.report');
Route::get('/bank_report', 'EmployeeController@bank_report')->name('bank.report');




