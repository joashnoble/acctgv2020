<?php

use Illuminate\Http\Request;

/*  API Routes
PLEASE REGISTER YOUR API BY PARENT MODULE ALPHABETICALLY THEN MODULE ALPHABETICALLY
SEARCH YOUR API USING '// NAMEOFPARENTMODULE' or '// NAMEOFMODULE' e.g. // REFERENCES, //DEPARTMENTS
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// REFERENCES

// ACCOUNT TYPES
Route::get('accounttypes','References\AccountTypesController@index');

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


// ACCOUNT CLASSES
Route::get('accountclasses','References\AccountClassesController@index');
Route::post('accountclass', 'References\AccountClassesController@create');
Route::get('accountclass/{id}','References\AccountClassesController@show');
Route::put('accountclass/{id}', 'References\AccountClassesController@update');
Route::put('accountclass/delete/{id}', 'References\AccountClassesController@delete');
Route::get('accountclasscheck/{id}', 'References\AccountClassesController@checkIfUsed');


// ACCOUNT TITLES
Route::get('accounttitlesoptions','References\AccountTitlesController@options'); // MINIMAL LIST, USED FOR SELECT2 OPTIONS
Route::get('accounttitlestree','References\AccountTitlesController@tree');
Route::get('accounttitles','References\AccountTitlesController@index'); // COMPREHENSIVE LIST
Route::post('accounttitle', 'References\AccountTitlesController@create');
Route::get('accounttitle/{id}','References\AccountTitlesController@show');
Route::put('accounttitle/{id}', 'References\AccountTitlesController@update');
Route::put('accounttitle/delete/{id}', 'References\AccountTitlesController@delete');
Route::get('accounttitlecheck/{id}', 'References\AccountTitlesController@checkIfUsed');

// DOES NOT NEED OWN REFERENCE
Route::get('taxtypes','References\TaxTypesController@index');
Route::get('itemtypes','References\ItemTypesController@index');
Route::get('customertypes','References\CustomerTypesController@index');

// MASTERFILES

// CUSTOMERS
Route::get('customers','Masterfiles\CustomersController@index');
Route::post('customer', 'Masterfiles\CustomersController@create');
Route::get('customer/{id}','Masterfiles\CustomersController@show');
Route::put('customer/{id}', 'Masterfiles\CustomersController@update');
Route::put('customer/delete/{id}', 'Masterfiles\CustomersController@delete');
Route::get('customercheck/{id}', 'Masterfiles\CustomersController@checkIfUsed');

// PRODUCTS
Route::get('products','Masterfiles\ProductsController@index');
Route::post('product', 'Masterfiles\ProductsController@create');
Route::get('product/{id}','Masterfiles\ProductsController@show');
Route::put('product/{id}', 'Masterfiles\ProductsController@update');
Route::put('product/delete/{id}', 'Masterfiles\ProductsController@delete');
Route::get('productcheck/{id}', 'Masterfiles\ProductsController@checkIfUsed');

// SALESPERSON SALES PERSON
Route::get('salespersons','Masterfiles\SalespersonsController@index');
Route::post('salesperson', 'Masterfiles\SalespersonsController@create');
Route::get('salesperson/{id}','Masterfiles\SalespersonsController@show');
Route::put('salesperson/{id}', 'Masterfiles\SalespersonsController@update');
Route::put('salesperson/delete/{id}', 'Masterfiles\SalespersonsController@delete');
Route::get('salespersoncheck/{id}', 'Masterfiles\SalespersonsController@checkIfUsed');

// SUPPLIERS
Route::get('suppliers','Masterfiles\SuppliersController@index');
Route::post('supplier', 'Masterfiles\SuppliersController@create');
Route::get('supplier/{id}','Masterfiles\SuppliersController@show');
Route::put('supplier/{id}', 'Masterfiles\SuppliersController@update');
Route::put('supplier/delete/{id}', 'Masterfiles\SuppliersController@delete');
Route::get('suppliercheck/{id}', 'Masterfiles\SuppliersController@checkIfUsed');

// SETTINGS

// GENERAL CONFIGURATION
Route::get('accountingperiod','Settings\AccountingPeriodController@index');
Route::get('generalconfiguration','Settings\GeneralConfigurationController@index'); // CURRENT SETTINGS
Route::get('companyinfo','Settings\GeneralConfigurationController@companyinfo'); // COMPANY INFO
Route::get('generalconfigurationoptions','Settings\GeneralConfigurationController@optionsandselects'); // OPTIONS AND DEFAULTS
Route::put('genconfcustomers', 'Settings\GeneralConfigurationController@customers'); // CUSTOMER 
Route::put('genconfsuppliers', 'Settings\GeneralConfigurationController@suppliers'); // SUPPLIER 
Route::put('genconfothers', 'Settings\GeneralConfigurationController@others'); // OTHER 
Route::put('genconfinventory', 'Settings\GeneralConfigurationController@inventory'); // INVENTORY COMPUTATION
Route::put('genconfsoa', 'Settings\GeneralConfigurationController@statementofaccount'); // RECEIVABLES
Route::put('genconffa', 'Settings\GeneralConfigurationController@fixedassets'); // FIXED ASSETS
Route::put('genconfcompany', 'Settings\GeneralConfigurationController@companyinfoset'); // FIXED ASSETS
Route::put('genconfbir', 'Settings\GeneralConfigurationController@birinfoset'); // FIXED ASSETS



Route::post('uploadlogo', function(Request $request){
    if ($request->file->isValid()) {
        $uploadedFile = $request->file; $uploadedPath = $request->path; $uploadedName = $request['name'];
        $server_file_name=uniqid(''); $extension = pathinfo($uploadedName, PATHINFO_EXTENSION); $file_path=$server_file_name.'.'.$extension;
        $uploadedFile->move($uploadedPath, $file_path); $completepath = $uploadedPath.'/'.$file_path;
        return response(['status'=>'success', 'path'=>$completepath], 200);
    }
});