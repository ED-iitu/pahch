<?php

use App\Services\Localization\Localization;
use Illuminate\Support\Facades\Route;

Route::any('/locale/{locale}', 'LocaleController')->name('locale');

Route::group(
    [
        'prefix'     => Localization::locale(),
        'middleware' => 'setLocale'
    ],
    function () {
        Route::group(['namespace' => 'Admin'], function (): void {
            Route::group(['middleware' => ['guest:web']], function (): void {
                Route::get('/auth/signin', 'AuthController@signin')->name('admin.auth.signin');
                Route::post('/auth/signin', 'AuthController@login');
                Route::get('/auth/signup', 'AuthController@signin')->name('admin.auth.signup');
                Route::post('/auth/signup', 'AuthController@login');
            });
            Route::post('/auth/signout', 'AuthController@signout')->name('admin.auth.signout');
        });

        Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['signed:web', 'is_admin']], function (): void {
            Route::get('/', 'CoreController@home')->name('home');
            Route::resource('users', 'UserController');
            Route::resource('news', 'NewsController');
            Route::resource('main', 'MainController');
            Route::resource('partners', 'PartnerController');
            Route::resource('materials', 'MaterialController');
            Route::resource('employees', 'EmployeeController');
        });
});