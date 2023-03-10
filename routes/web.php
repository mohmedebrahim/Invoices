<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();
Route::get('pages/{page}', 'AdminController@index');
Route::resource('invoices', 'InvoiceController');
Route::resource('sections', 'SectionController');
Route::resource('products', 'ProductController');
Route::get('/invoicedetails/{id}', 'InvoiceDetailController@edit');
Route::get('download/{invoice_number}/{file_name}', 'InvoiceDetailController@get_file');
Route::get('view_file/{invoice_number}/{file_name}', 'InvoiceDetailController@open_file');
Route::post('delete_file', 'InvoiceDetailController@destroy')->name('delete_file');
Route::post('invoiceattachments', 'InvoiceAttachmentController@store');
Route::get('/edit_invoice/{id}', 'InvoiceController@edit');
Route::get('/status_show/{id}', 'InvoiceController@show')->name('status_show');
Route::post('/status_update/{id}', 'InvoiceController@status_update')->name('status_update');
Route::get('invoice_paid', 'InvoiceController@invoice_paid');
Route::get('invoice_unpaid', 'InvoiceController@invoice_unpaid');
Route::get('invoice_partial', 'InvoiceController@invoice_partial');
Route::resource('archive', 'InvoiceArchiveController');
Route::get('print_invoice/{id}','InvoiceController@print_invoice');

Route::get('invoices_report','InvoiceController@report');
Route::post('invoices_search','InvoiceController@invoices_search');
Route::get('customers_report','InvoiceController@customers_report');
Route::post('customers_search','InvoiceController@customers_search');
// maatwebsite package Export Excel
Route::get('export_invoices', 'InvoiceController@export');
// Mark As Read All Notification
Route::get('/MarkAsReadAll','InvoiceController@markAsReadAll');

// using Ajax in route go to method (getProducts) in (InvoiceController)
// used scriptAjax Javascript in blade (add_invoice)
Route::get('/section/{id}', 'InvoiceController@getProducts');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
Route::resource('roles','RoleController');
Route::resource('users','UserController');
});
