<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DesignerCollectionControler;
use App\Http\Resources\DesignerResource;


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
Route::resource('collections', CollectionController::class);
Route::get('/users',[UserController::class, 'index']);

Route::get('/users/{id}',[UserController::class, 'show']);

Route::get('/designers/{id}',[DesignerController::class, 'show']);


Route::get('/designers/{id}/collections',[DesignerCollectionControler::class, 'index'])->name('designers.collections.index');

//Route::get('/collections',[CollectionController::class, 'index']);
//Route::get('/collections/{id}',[CollectionController::class, 'show']);
