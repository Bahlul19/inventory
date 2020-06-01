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

// Route::get('/', function () {
//     return view('welcome');
// });

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home-page', 'HomeController@homePage')->name('homepage');

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
