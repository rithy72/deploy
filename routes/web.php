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
        });
    });



    // Admin
    Route::get('/admin/mainform',function (){
        return view('Admin.admin_main');
    });
    Route::get('/admin/invoice',function (){
        return view('Admin.Invoice.invoice_pajam');
    });
    Route::get('/admin/inventory',function (){
        return view('Admin.Sar_Per_Poun.sa_per_poun');
    });
    Route::get('/admin/user',function (){
        return view('Admin.User_Use_System.user_use_system');
    });
    Route::get('/admin/history_user',function (){
        return view('Admin.Action_History_User.history_user');
    });
    Route::get('/admin/invoice/create_new_invoice',function (){
        return view('Admin.Invoice.create_new_invoice');
    });
    Route::get('/admin/invoice/invoice_detail',function (){
        return view('Admin.Invoice.detail_invoice');
    });
    Route::get('/admin/invoice/update_invoice',function (){
        return view('Admin.Invoice.update_invoice');
    });
    Route::get('/admin/invoice/invoice_payment',function (){
        return view('Admin.Invoice.payment_invoice');
    });
    Route::get('/admin/report',function (){
        return view('Admin.Ror_Bay_kar.ror_bay_kar');
    });

    Route::get('/admin/item_type',function (){
        return view('Admin.TypeOfItems.typeItem');
    });
//================================ Test =================================
    Route::get('/test', 'TestController@Test');
    Route::post('/test_post', 'TestController@Post');
    Route::get('/test_api','TestController@API');
//========================================================================
//============================= API ======================================


});


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
});