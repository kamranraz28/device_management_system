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
//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

Route::get('/config-clear', function() {
    $exitCode = Artisan::call('config:clear');
    return '<h1>Config Clear loader</h1>';
});



//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear View cache:
Route::get('/storage-link', function() {
    $exitCode = Artisan::call('storage:link');
    return '<h1>Storage Link Created </h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

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


Route::get('/real_list', [ClientController::class, 'real_list'])->name('real_list');

Route::get('/send/{sn}', [ClientController::class, 'send'])->name('send');

Route::post('/display/{sn}', [ClientController::class, 'display'])->name('display');

Route::get('/qrcode_view/{sn}', [ClientController::class, 'qrcode_view'])->name('qrcode_view');


Route::post('/qr/{sn}', [ClientController::class, 'qr'])->name('qr');

Route::get('/user', [FrontdeskController::class, 'user'])->name('user');
Route::get('/new_user_add', [FrontdeskController::class, 'new_user_add'])->name('new_user_add');
Route::post('/storeUser', [FrontdeskController::class, 'storeUser'])->name('storeUser');

Route::post('/cashin/{sn}', [ClientController::class, 'cashin'])->name('cashin');
Route::post('/cashout/{sn}', [ClientController::class, 'cashout'])->name('cashout');
Route::post('/paybill/{sn}', [ClientController::class, 'paybill'])->name('paybill');


Route::get('/total_device', [FrontdeskController::class, 'total_device'])->name('total_device');

Route::post('/register_now', [ClientController::class, 'register_now'])->name('register_now');


//Report
Route::get('/device_activation_report', [FrontdeskController::class, 'device_activation_report'])->name('device_activation_report');
Route::get('/stock_report', [FrontdeskController::class, 'stock_report'])->name('stock_report');
Route::get('/registered_device_report', [FrontdeskController::class, 'registered_device_report'])->name('registered_device_report');
Route::get('/unregistered_device_report', [FrontdeskController::class, 'unregistered_device_report'])->name('unregistered_device_report');
Route::get('/device_repair_report', [FrontdeskController::class, 'device_repair_report'])->name('device_repair_report');














    







