<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;

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
Route::get('users/{id}', function ($id) {
    return 'Usuário $id' ;

});

Route::controller(FoodController::class)->group(function () {
    Route::get('/foods','index');//Fetches details for multiple food items using input IDs
    Route::get('/food/{id}','show');//Fetches details for one food item by ID

    Route::get('/foods/list', [FoodController::class,'show']);//Returns a paged list of foods, in the 'abridged' format
    #Route::get('/foods/search', [FoodController::class,'index']);//Returns a list of foods that matched search (query) keywords
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
