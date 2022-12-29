<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DesignerController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\AuthController;
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
});\

//Route::resource('collections', CollectionController::class);

//n
// Route::get('/users',[UserController::class, 'index']);

// Route::get('/users/{id}',[UserController::class, 'show']);

// Route::get('/designers/{id}',[DesignerController::class, 'show']);


// Route::get('/designers/{id}/collections',[DesignerCollectionControler::class, 'index'])->name('designers.collections.index');
//n

//************
//Route::get('/collections',[CollectionController::class, 'index']);
//Route::get('/collections/{id}',[CollectionController::class, 'show']);

//*************************** */
Route::post('/register',[AuthController::class,'registration']);
Route::post('/login',[AuthController::class,'login']);



Route::group(['middleware'=>['auth:sanctum']],function () {
    Route::get('/profile', function(Request $request){
        return auth()->user();
    });
    Route::resource('products', ProductController::class)->only(['store','update','destroy']);
    Route::post('/logout',  [AuthController::class, 'logout']);

});





//n
Route::resource('products', ProductController::class)->only(['index','show']);
