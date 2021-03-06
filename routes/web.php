<?php

// use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\Console\Input\Input;
use Illuminate\Foundation\Application;
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


// ------------------------------------------------------------------------

// ------------------------------------------------------------------------
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        
        Auth::routes(['verify'=>true]);
        Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
        Route::resource('product','ProductController');
        Route::resource('category','CategoryController');
        Route::resource('subcategory','SubCategoryController');
        // ------------------------------------------------------------------------
        // select all products
        Route::get('/', 'ProductController@products')->name('product.products');
        // ------------------------------------------------------------------------
        $subjects = [
            'product', 'category', 'subcategory'
        ];
        
        foreach ($subjects as $subject) {
            Route::prefix($subject)->group(function () {
                Route::get('/{any}', function($any){
                    // return redirect('/');
                    return view('NotFound');
                })->where('any', '.*');
            });
        }
});

// ajax
Route::get('/ajax-subcat','SubCategoryController@ajax');

// ------------------------------------------------------------------------

// Route::get('/NotFound', function(){
//     return view('NotFound');
// });

Route::get('/{any}', function($any){
    // redirect('/NotFound');
    return view('NotFound');
})->where('any', '.*');
