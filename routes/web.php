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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
