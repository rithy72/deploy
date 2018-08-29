<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//
Auth::routes();
//
//Admin
Route::middleware('auth')->group(function (){
    /* *
     * Admin Route Group
     * */
    Route::middleware('admin')->group(function (){
        Route::prefix('admin')->group(function () {
            Route::get('/', function (){
                return view('Admin.admin_main');
            });
            Route::get('/admin/MainForm',function (){
                return view('Admin.admin_main');
            });
            Route::get('/admin/Invoice',function (){
                return view('Admin.Invoice.invoice_pajam');
            });
        });
    });
    /* *
     * User Route Group
     * */
    Route::middleware('user')->group(function (){
        Route::prefix('user')->group(function () {
            Route::get('/', function (){
                return view('Front-Desk.front_desk_main');
            });
            Route::get('/admin/Invoice',function (){
                return view('Admin.Invoice.invoice_pajam');
            });
        });
    });






});