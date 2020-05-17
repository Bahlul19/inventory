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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/link', function () {
    return view('link');
});

// Route::get('/home', function () {
//     return view('home');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//Category Routing

Route::post('/add-category','CategoryController@add');
Route::get('/all-category','CategoryController@allCategory')->name('all.category');
Route::get('/delete-category/{id}','CategoryController@deleteCategory');
Route::get('/edit-category/{id}','CategoryController@editCategory');
Route::post('/update-category/{id}','CategoryController@updateCategory');
 

//Posts Routing
Route::post('/add-post', 'PostsController@addPost');
Route::post('/all-post', 'PostsController@allPost')->name('all.post');
Route::get('/edit-post/{id}', 'UserPostsController@editPost');
Route::post('/update-posts/{id}','UserPostsController@updatePost');
Route::get('/delete-posts/{id}','UserPostsController@deletePost');