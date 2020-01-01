<?php

use Illuminate\Http\Request;

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

Route::post('createUser/', 'machineController@create_user');

Route::get('userLogin/','machineController@user_login');

Route::post('createAdmin/','machineController@create_admin');

Route::get('adminLogin/','machineController@admin_login');

Route::post('machineCategory/','machineCategoryController@machine_category');  

Route::post('materialCategory/','materialCategoryController@material_category');

Route::post('addMachine/','Machine@add_machine');

