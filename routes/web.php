<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//home page URL

Route::get('/', function () {
    return Redirect()->route('login');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/link', function () {
    return view('link');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home-page', 'HomeController@homePage')->name('homepage')->middleware('verified');

//password change

Route::get('/passsword-change', 'HomeController@passwordChange')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword');

//Category Routing

Route::post('/add-category', 'CategoryController@add');
Route::get('/all-category', 'CategoryController@allCategory')->name('all.category');
Route::get('/delete-category/{id}', 'CategoryController@deleteCategory');
Route::get('/edit-category/{id}', 'CategoryController@editCategory');
Route::post('/update-category/{id}', 'CategoryController@updateCategory');

//Posts Routing
Route::post('/add-post', 'PostsController@addPost');
Route::get('/all-post', 'PostsController@allPost')->name('all.post');
Route::get('/edit-post/{id}', 'PostsController@editPost');
Route::post('/update-post/{id}', 'PostsController@updatePost');
Route::get('/delete-post/{id}', 'PostsController@deletePost');

//Employee Controller

Route::get('/Employee.add_employee', 'EmployeeController@addEmployee')->name('add.employee');
Route::post('/Employee.store_data', 'EmployeeController@storeData');
Route::get('/Employee.all_employee', 'EmployeeController@getAllEmployee')->name('all.employee');
Route::get('/Employee.edit_employee/{id}', 'EmployeeController@editData');
Route::get('/Employee.delete_employee/{id}', 'EmployeeController@deleteEmployee');
Route::post('/Employee.update_employee/{id}', 'EmployeeController@updateEmployee');
Route::get('/Employee.view_employee/{id}', 'EmployeeController@viewIndividualData');


Route::get('/Customer.add_customer', 'CustomerController@addCustomer')->name('add.customer');
Route::post('/Customer.store_data', 'CustomerController@storeData');
Route::get('/Customer.all_customer', 'CustomerController@getAllCustomer')->name('all.customer');
Route::get('/Customer.view_customer/{id}', 'CustomerController@viewIndividualCustomer');
Route::get('/Customer.delete_customer/{id}', 'CustomerController@deleteCustomer');
Route::get('/Customer.edit_customer/{id}', 'CustomerController@editCustomer');
Route::post('/Employee.update_customer/{id}', 'CustomerController@updateCutomer');

Route::get('/Suppliers.add_suppliers', 'SupplierController@addSupplier')->name('add.suppliers');
Route::post('/Suppliers.store_data', 'SupplierController@storeData');
Route::get('/Suppliers.all_customer', 'SupplierController@getAllSupplier')->name('all.suppliers');
// Route::get('/Customer.view_customer/{id}', 'CustomerController@viewIndividualCustomer');
Route::get('/Suppliers.delete_suppliers/{id}', 'SupplierController@deleteSupplier');
Route::get('/Suppliers.edit_suppliers/{id}', 'SupplierController@editSupplier');
Route::post('/Suppliers.update_suppliers/{id}', 'SupplierController@updateSupplier');