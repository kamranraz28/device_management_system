<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FrontDeskController; 
use App\Http\Controllers\ClientController;


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

Route::get('/', [HomeController::class, 'home'])->name('home');


Route::get('/applyForVisit', [ApplyController::class, 'apply'])->name('apply');
Route::get('/applyForVisit', [ApplyController::class, 'apply'])->name('apply');
Route::get('/getStaff/{id?}', [ApplyController::class, 'getStaff'])->name('getStaff');
Route::post('/applyStore', [ApplyController::class, 'applyStore'])->name('applyStore');

Route::get('/admin_login', [LoginController::class, 'login'])->name('login');
Route::post('/admin_login', [LoginController::class, 'log_in'])->name('log_in');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/new_visitors_application', [FrontdeskController::class, 'new_visitor'])->name('new_visitor');
Route::get('/new_visitors_approve/{id}', [FrontdeskController::class, 'visitor_approve'])->name('visitor_approve');
Route::get('/application_reject/{id}', [FrontdeskController::class, 'application_reject'])->name('application_reject');
Route::get('/application_details/{id}', [FrontdeskController::class, 'application_details'])->name('application_details');
Route::get('/total_visitors', [FrontdeskController::class, 'total_visitor'])->name('total_visitor');
Route::get('/new_visitor_add', [FrontdeskController::class, 'new_visitor_add'])->name('new_visitor_add');

Route::get('/dashboard', [FrontdeskController::class, 'dashboard'])->name('dashboard');
Route::post('/final_approve', [FrontdeskController::class, 'final_approve'])->name('final_approve');

Route::get('/warranty_activation', [FrontdeskController::class, 'warranty_activation'])->name('warranty_activation');

Route::get('/device_activation_report', [FrontdeskController::class, 'device_activation_report'])->name('device_activation_report');

Route::get('/real_list', [ClientController::class, 'real_list'])->name('real_list');

Route::post('/display/{sn}', [ClientController::class, 'display'])->name('display');





    







