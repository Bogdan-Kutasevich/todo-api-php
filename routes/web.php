<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TodosController::class)->group(function () {
    Route::get('/todos', 'index');
    Route::post('/todos', 'store');
    Route::patch('/todos/{id}', 'update');
    Route::delete('/todos/{id}', 'destroy');
});

//Route::resource('todos', TodosController::class)->only([
//    'index', 'store', 'show', 'update', 'destroy'
//]);
