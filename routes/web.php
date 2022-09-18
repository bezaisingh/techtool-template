<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\Auth\RegisterController;

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
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

// Permissions
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);

// Users 
Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');

    
    Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');

    Route::get('export/', [UserController::class, 'export'])->name('export');

    //Acccount Details
    Route::get('/account', [AccountController::class, 'account'])->name('account');
    Route::post('/saveAccount', [AccountController::class, 'saveAccount'])->name('saveAccount');
    Route::get('/accounList', [AccountController::class, 'accounList'])->name('accounList');

    //Loan Details
    Route::get('/addLoan', [LoanController::class, 'addLoan'])->name('addLoan');
    Route::post('/saveShortTermLoan', [LoanController::class, 'saveShortTermLoan'])->name('saveShortTermLoan');
    Route::post('/saveLongTermLoan', [LoanController::class, 'saveLongTermLoan'])->name('saveLongTermLoan');
    
    //report/consolidated data
    Route::get('/report', [UserController::class, 'report'])->name('report');

        //for specific user
        Route::get('/myUser', [UserController::class, 'myUser'])->name('myUser');
        Route::get('/addMyUser', [UserController::class, 'addMyUser'])->name('addMyUser');
        Route::get('/signUp', [RegisterController::class, 'addMyUser'])->name('signUp');
});

