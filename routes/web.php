<?php

// use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

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


Auth::routes(['verify'=>true]);
// ------------------------------------------------------------------------
Route::get('/', 'ProductController@index')->name('product.index');
// ------------------------------------------------------------------------
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
// ------------------------------------------------------------------------
Route::resource('product','ProductController');
// ------------------------------------------------------------------------
// select all products
Route::get('/', 'ProductController@index')->name('product.index');
Route::group(['prefix' => 'product','middleware'=>'auth'], function () {


    // show one product
    Route::get('/{id}', 'ProductController@show')->name('product.show');

    // create a product
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::post('/', 'ProductController@store')->name('product.store');

    // edit a product
    Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('/update/{id}', 'ProductController@update')->name('product.update');

    // delete a product
    Route::get('/destroy/{id}', 'ProductController@destroy')->name('product.destroy');

});
// ------------------------------------------------------------------------
// Route::resource('category','SubCategoryController');
// category
Route::get('/category', 'CategoryController@index')->name('category.index');

Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::post('category/store', 'CategoryController@store')->name('category.store');
Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('category/update/{id}', 'CategoryController@update')->name('category.update');

Route::get('category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
// ------------------------------------------------------------------------
// subcategory
Route::get('/subcategory', 'SubCategoryController@index');

Route::get('subcategory/create', 'SubCategoryController@create')->name('subcategory.create');
Route::post('subcategory/store', 'SubCategoryController@store')->name('subcategory.store');
Route::get('subcategory/edit/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
Route::post('subcategory/update/{id}', 'SubCategoryController@update')->name('subcategory.update');

Route::get('subcategory/destroy/{id}', 'SubCategoryController@destroy')->name('subcategory.destroy');
// ------------------------------------------------------------------------
// ajax
Route::get('/ajax-subcat','SubCategoryController@ajax');
// ------------------------------------------------------------------------
Route::get('/nn', function(){
    return view('NotFound');
});
