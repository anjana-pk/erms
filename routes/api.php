<?php

use App\Category;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getAllCategory', function() {
    return response(Category::all(['category_name', 'id', 'category_id']));
});

Route::post('createUser', 'UserController@fn_create_user');
Route::post('userLogin', 'UserController@fn_user_login');
Route::post('createCategory', 'CategoryController@fn_create_category');
