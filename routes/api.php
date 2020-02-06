<?php

use Illuminate\Http\Request;

/*  API Routes
PLEASE REGISTER YOUR API BY PARENT MODULE THEN ALPHABETICALLY
SEARCH YOUR API USING '// nameOfModule' or '// nameOfParentModule' e.g. // REFERENCES, //DEPARTMENTS

*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// REFERENCES

// BANKS
Route::get('banks','References\BanksController@index');
Route::post('bank', 'References\BanksController@create');
Route::get('bank/{id}','References\BanksController@show');
Route::put('bank/{id}', 'References\BanksController@update');
Route::put('bank/delete/{id}', 'References\BanksController@delete');
Route::get('bankcheck/{id}', 'References\BanksController@checkIfUsed');

// BRANDS
Route::get('brands','References\BrandsController@index');
Route::post('brand', 'References\BrandsController@create');
Route::get('brand/{id}','References\BrandsController@show');
Route::put('brand/{id}', 'References\BrandsController@update');
Route::put('brand/delete/{id}', 'References\BrandsController@delete');
Route::get('brandcheck/{id}', 'References\BrandsController@checkIfUsed');

// CATEGORIES
Route::get('categories','References\CategoriesController@index');
Route::post('category', 'References\CategoriesController@create');
Route::get('category/{id}','References\CategoriesController@show');
Route::put('category/{id}', 'References\CategoriesController@update');
Route::put('category/delete/{id}', 'References\CategoriesController@delete');
Route::get('categorycheck/{id}', 'References\CategoriesController@checkIfUsed');

// DEPARTMENTS
Route::get('departments','References\DepartmentsController@index');
Route::post('department', 'References\DepartmentsController@create');
Route::get('department/{id}','References\DepartmentsController@show');
Route::put('department/{id}', 'References\DepartmentsController@update');
Route::put('department/delete/{id}', 'References\DepartmentsController@delete');
Route::get('departmentcheck/{id}', 'References\DepartmentsController@checkIfUsed'); 

// LOCATIONS
Route::get('locations','References\LocationsController@index');
Route::post('location', 'References\LocationsController@create');
Route::get('location/{id}','References\LocationsController@show');
Route::put('location/{id}', 'References\LocationsController@update');
Route::put('location/delete/{id}', 'References\LocationsController@delete');
Route::get('locationcheck/{id}', 'References\LocationsController@checkIfUsed');

// UNITS
Route::get('units','References\UnitsController@index');
Route::post('unit', 'References\UnitsController@create');
Route::get('unit/{id}','References\UnitsController@show');
Route::put('unit/{id}', 'References\UnitsController@update');
Route::put('unit/delete/{id}', 'References\UnitsController@delete');
Route::get('unitcheck/{id}', 'References\UnitsController@checkIfUsed');




// PENDING
Route::get('accountclasses','References\AccountClassesController@index');
Route::get('banks','References\BanksController@index');
Route::get('products','References\ProductsController@index');
 