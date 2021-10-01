<?php

use Illuminate\Support\Facades\Route;
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
// Route::redirect('/', 'login');
Auth::routes(['register' => true]);

Route::get('/products', [App\Http\Controllers\ListController::class, 'index'])->name('products');
Route::get('/list', [App\Http\Controllers\ListController::class, 'index'])->name('list');
Route::put('/list/delete', [App\Http\Controllers\ListController::class, 'delete'])->name('/list/delete');
Route::post('/list/add', [App\Http\Controllers\ListController::class, 'add'])->name('/list/add');
Route::get('/autocomplete-search', [AutocompleteController::class, 'autocompleteSearch'])->name('autocompleteSearch');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
