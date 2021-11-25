<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AutocompleteController;

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
Route::redirect('/', 'logout');
Auth::routes(['register' => true]);

Route::resource('productEntity', ProductController::class);
Route::post("/ProductEntity/cba", [ProductController::class, 'cba']);

Route::resource("list", ListController::class);
Route::post("/list/cba", [ListController::class, 'cba']);
Route::get('/autocomplete-search', [AutocompleteController::class, 'autocompleteSearch'])->name('autocompleteSearch');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
