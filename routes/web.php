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

    // Admin
    Route::prefix('admin')->group(function(){
        Route::get('/mainform',function (){
            return view('Admin.admin_main');
        });
        Route::get('/invoice',function (){
            return view('Admin.Invoice.invoice_pajam');
        });
        Route::get('/inventory',function (){
            return view('Admin.Sar_Per_Poun.sa_per_poun');
        });
        Route::get('/user',function (){
            return view('Admin.User_Use_System.user_use_system');
        });
        Route::get('/history_user',function (){
            return view('Admin.Action_History_User.history_user');
        });
        Route::get('/invoice/create_new_invoice',function (){
            return view('Admin.Invoice.create_new_invoice');
        });
        Route::get('/invoice/invoice_detail',function (){
            return view('Admin.Invoice.detail_invoice');
        });
        Route::get('/invoice/update_invoice',function (){
            return view('Admin.Invoice.update_invoice');
        });
        Route::get('/invoice/invoice_payment',function (){
            return view('Admin.Invoice.payment_invoice');
        });
        Route::get('/report',function (){
            return view('Admin.Ror_Bay_kar.ror_bay_kar');
        });

        Route::get('/item_type',function (){
            return view('Admin.TypeOfItems.typeItem');
        });

//============================= API ==============================================================================
        Route::prefix('api')->group(function (){
            /* *
             * Item Type
             * */
            Route::prefix('item_group')->group(function (){
                Route::get('/', 'APIController\ItemTypeController@index');
                Route::post('/', 'APIController\ItemTypeController@create');
                Route::put('/{id}','APIController\ItemTypeController@edit');
                Route::delete('/{id}','APIController\ItemTypeController@destroy');
                Route::put('/deactivate/{id}','APIController\ItemTypeController@deactivate');
                Route::put('/activate/{id}','APIController\ItemTypeController@activate');
            });
            /* *
             * Invoice
             * */
            Route::prefix('invoice')->group(function (){
                Route::get('/','APIController\InvoiceController@search');
                Route::get('/{id}','APIController\InvoiceController@find');
                Route::post('/','APIController\InvoiceController@create');
                Route::put('/{id}','APIController\InvoiceController@edit');
            });
            /* *
             * Invoice Item
             * */
            Route::prefix('item')->group(function (){
               Route::get('/invoice/{invoice_id}','APIController\InvoiceItemController@GetInvoiceItems');
            });
            /* *
             * Daily Report
             * */
            Route::prefix('daily_report')->group(function (){
                Route::get('/', 'APIController\DailyReport@getCurrentReport');
            });
        });
//================================================================================================================
//================================ Test ==========================================================================
        Route::get('/test', 'TestController@Test');
        Route::post('/test_post', 'TestController@Post');
        Route::get('/test_api','TestController@API');
//================================================================================================================
    });


});


