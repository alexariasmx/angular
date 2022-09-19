<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Galeria;
use App\Http\Controllers\galeria\galeriaApiController;
use App\Http\Resources\GaleriaResource;

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

    Route::get('/galeria', function(){
        return GaleriaResource::collection(Galeria::all());
    });

    Route::get('/galeria/{id}', function($id){
        return new GaleriaResource(Galeria::findOrFail($id));
    });

    Route::post('/galeria',[galeriaApiController::class,'store']);
    Route::put('/galeria/{id}',[galeriaApiController::class,'update']);
    Route::delete('/galeria/{id}',[galeriaApiController::class,'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
