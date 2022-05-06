<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('categories', CategoryController::class);
/*->only(['view', 'addCategory', 'upCategory', 'delCategory'])
->names([
    'view' => 'categories.index']);*/

// Rutas Categoria
Route::get('categories', 'App\Http\Controllers\CategoryController@view'); //mostrar
Route::post('categories', 'App\Http\Controllers\CategoryController@addCategory'); //crear
Route::put('categories/{id}', 'App\Http\Controllers\CategoryController@upCategory'); //actualizar
Route::delete('categories/{id}', 'App\Http\Controllers\CategoryController@delCategory'); //eliminar
Route::get('categories/{id}', 'App\Http\Controllers\CategoryController@showCategory'); //obtener registro

// rutas Agenda
Route::get('task', 'App\Http\Controllers\TaskController@view'); //mostrar
Route::post('task', 'App\Http\Controllers\TaskController@addTask'); //crear
Route::put('task/{id}', 'App\Http\Controllers\TaskController@upTask'); //actualizar
Route::delete('task/{id}', 'App\Http\Controllers\TaskController@delTask'); //eliminar
Route::get('task/{id}', 'App\Http\Controllers\TaskController@showTask'); //obtener registro