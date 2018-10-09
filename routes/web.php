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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    \App\Http\Controllers\Base\Logic\OtherLogic\InitLogic::InitSuperUser();
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
                Route::put('/payment/{invoice_id}',
                    'APIController\InvoiceController@InvoicePaymentAndItemsTransaction');
                Route::put('/took/{invoice_id}', 'APIController\InvoiceController@TookInvoice');
                Route::get('/transaction_history/{invoice_id}',
                    'APIController\InvoiceController@OneInvoiceTransactionHistory');
            });
            Route::prefix('invoices')->group(function (){
                Route::get('/over_due','APIController\InvoiceController@GetOverDueInvoices');
            });
            /* *
             * Invoice Item
             * */
            Route::prefix('item')->group(function (){
                Route::get('/','APIController\InvoiceItemController@FilterSearch');
                Route::get('/invoice/{invoice_id}','APIController\InvoiceItemController@GetInvoiceItems');
                Route::put('/sale/{item_id}','APIController\InvoiceItemController@SaleItem');
            });
            /* *
             * Daily Report
             * */
            Route::prefix('daily_report')->group(function (){
                Route::get('today', 'APIController\DailyReport@getCurrentReport');
                Route::get('/', 'APIController\DailyReport@Filter');
                Route::get('/sum','APIController\DailyReport@Calculate');
            });
            /* *
             * User
             * */
            Route::prefix('user')->group(function (){
                Route::get('/search','APIController\UserController@search');
                Route::get('/user_history/{user_id}','APIController\UserController@user_history');
                Route::get('/action_history/{user_id}','APIController\UserController@user_action');
                Route::get('/find/{id}', 'APIController\UserController@find');
                Route::post('/create','APIController\UserController@create');
                Route::put('/edit/{user_id}','APIController\UserController@edit');
                Route::delete('/delete/{user_id}','APIController\UserController@delete');
                Route::put('/deactivate/{user_id}','APIController\UserController@deactivateUser');
                Route::put('/activate/{user_id}','APIController\UserController@activateUser');
                Route::put('/reset_own_password/{user_id}','APIController\UserController@resetPassword');
                Route::put('/admin_reset_user_password/{user_id}','APIController\UserController@adminReset');
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


