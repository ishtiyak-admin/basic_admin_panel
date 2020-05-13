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

// Route to clear cache
Route::get('/clearSiteCache', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('view:clear');
    return redirect()->to(url('admin'));
});

// All Admin Routes
Route::group([ "prefix" => "admin", "namespace" => "backend", "middleware" => ["prevent_back_history"] ], function(){
    // routes called when not logged in
    Route::group([ "middleware" => ["adminlogout"] ], function(){
        /** Auth Routes Start **/
        Route::any('login', 'HomeController@login');
        Route::any('forgot_password', 'HomeController@forgot_password');
        Route::any('reset_password/{slug}', 'HomeController@reset_password');
        /** Auth Routes End **/
    });
    Route::any('logout', 'HomeController@logout');
    // routes called when logged in
    Route::group([ "middleware" => ["adminlogin"] ], function(){

        /** Admin Dashboard Routes Start **/
        Route::get('/', 'HomeController@index');
        Route::any('/profile_update', 'HomeController@profile_update');
        Route::post('/change_password', 'HomeController@change_password');
        Route::any('/global_settings', 'HomeController@global_settings');
        /** Admin Dashboard Routes End **/

        /** Users Routes Start **/
        Route::group([ "prefix" => "users"], function(){
            Route::get('/', 'UserController@index');
            Route::any('create', 'UserController@create');
            Route::any('edit/{id}', 'UserController@edit');
            Route::get('view/{id}', 'UserController@view');
            Route::get('status_update/{id}/{status}', 'UserController@status_update');
            Route::get('delete/{id}', 'UserController@delete');
            Route::get('export/{type}', 'UserController@export');
        });
        /** Users Routes End **/
        
        /** CMS Page Routes Start **/
        Route::group([ "prefix" => "cms_pages"], function(){
            Route::get('/', 'CmsPageController@index');
            Route::any('create', 'CmsPageController@create');
            Route::any('edit/{id}', 'CmsPageController@edit');
            Route::get('view/{id}', 'CmsPageController@view');
            Route::get('delete/{id}', 'CmsPageController@delete');
            Route::get('status_update/{id}/{status}', 'CmsPageController@status_update');
        });
        /** CMS Page Routes End **/

        /** Email Template Routes Start **/
        Route::group([ "prefix" => "email_templates"], function(){
            Route::get('/', 'EmailTemplateController@index');
            Route::any('create', 'EmailTemplateController@create');
            Route::any('edit/{id}', 'EmailTemplateController@edit');
            Route::get('view/{id}', 'EmailTemplateController@view');
            Route::get('delete/{id}', 'EmailTemplateController@delete');
            Route::get('status_update/{id}/{status}', 'EmailTemplateController@status_update');
        });
        /** Email Template Routes End **/

        /** FAQ Routes Start **/
        Route::group([ "prefix" => "faq"], function(){
            Route::get('/', 'FaqController@index');
            Route::any('create', 'FaqController@create');
            Route::any('edit/{id}', 'FaqController@edit');
            Route::get('view/{id}', 'FaqController@view');
            Route::get('delete/{id}', 'FaqController@delete');
            Route::get('status_update/{id}/{status}', 'FaqController@status_update');
        });
        /** FAQ Routes End **/

        /** Enquiry Routes Start **/
        Route::group([ "prefix" => "enquiries"], function(){
            Route::get('/', 'EnquiryController@index');
            Route::any('create', 'EnquiryController@create');
            Route::any('edit/{id}', 'EnquiryController@edit');
            Route::get('view/{id}', 'EnquiryController@view');
            Route::get('delete/{id}', 'EnquiryController@delete');
            Route::get('status_update/{id}/{status}', 'EnquiryController@status_update');
            Route::post('reply/{id}', 'EnquiryController@reply');
        });
        /** Enquiry Routes End **/

    });
});

Route::group([ "namespace" => "frontend", "middleware" => ["prevent_back_history"] ], function(){
    Route::get('/', function(){ return view('welcome'); }); 
    /** CMS Pages Routes Start **/
    Route::any('pages/{slug}', 'CmsPagesController@cms_pages');
    /** CMS Pages Routes End **/
});