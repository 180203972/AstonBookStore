<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [
    'uses' => 'BookController@getIndex',
    'as' => 'book.index'
]);

Route::get('/add-to-basket/{id}', [
    'uses' => 'BookController@getAddToBasket',
    'as' => 'book.addToBasket',
]);

Route::get('/reduce/{id}', [
    'uses' => 'BookController@getReduceByOne',
    'as' => 'book.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'BookController@getRemoveAll',
    'as' => 'book.removeAll'
]);

Route::get('/basket', [
    'uses' => 'BookController@getBasket',
    'as' => 'book.basket',
]);

Route::get('/checkout', [
    'uses' => 'BookController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'BookController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::group(['prefix' => 'user'], function() {
    Route::group(['middleware' => 'guest'], function() {
        Route::get('/signup', [
            'uses' => "UserController@getSignUp",
            'as' => 'user.signup'
        ]);

        Route::post('/signup', [
            'uses' => 'UserController@postSignUp',
            'as' => 'user.signup'
        ]);
        
        Route::get('/login', [
            'uses' => "UserController@getLogin",
            'as' => 'user.login'
        ]);
        
        Route::post('/login', [
            'uses' => 'UserController@postLogin',
            'as' => 'user.login'
        ]);
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);
        
        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });

    Route::group(['prefix' => 'admin'], function() {
        Route::group(['middleware' => 'web'], function(){
            Route::get('/login',[
                'uses' => 'UserController@getAdminLogin',
                'as' => 'admin.login',
            ]);

            Route::post('/login',[
                'uses' => 'UserController@postAdminLogin',
                'as' => 'admin.login',
            ]);

            Route::get('/profile',[
                'uses' => 'UserController@getAdminProfile',
                'as' => 'admin.profile',
                'middleware' => 'roles',
                'roles' => ['Admin']
            ]);

            Route::get('/create',[
                'uses' => 'BookController@getCreateBook',
                'as' => 'admin.create',
                'middleware' => 'roles',
                'roles' => ['Admin']
            ]);

            Route::post('/create', [
                'uses' => 'BookController@postCreateBook',
                'as' => 'admin.create',
                'middleware' => 'roles',
                'roles' => ['Admin']
            ]);

            Route::get('/show/{id}',[
                'uses' => 'BookController@getShowBook',
                'as' => 'admin.show',
                'middleware' => 'roles',
                'roles' => ['Admin']
            ]);

            Route::get('/edit/{id}', [
                'uses' => 'BookController@getEditBook',
                'as' => 'admin.edit',
                'middleware' => 'roles',
                'roles' => ['Admin']
            ]);

            Route::patch('/edit/{id}', [
                'uses' => 'BookController@patchEditBook',
                'as' => 'admin.edit',
                'middleware' => 'roles',
                'roles' => ['Admin']
            ]);

            Route::delete('/delete/{id}', [
                'uses' => 'BookController@deleteBook',
                'as' => 'admin.delete',
                'middleware' => 'roles',
                'roles' => ['Admin']
            ]);
        });
    });
});