<?php

use Illuminate\Support\Facades\Route;
// Homepage Routes
Route::get('/','IndexController@index')->name('latest');
Route::get('/local','IndexController@local')->name('local');
Route::get('/sports','IndexController@sports')->name('sports');
Route::get('/lifestyle','IndexController@lifestyle')->name('lifestyle');
Route::get('/entertainment','IndexController@entertainment')->name('entertainment');
Route::get('/view/{id}','IndexController@view')->name('view');
// Dashboard Routes
Route::get('admin','DashboardController@index')->name('admin');
// Profiles Routes
Route::get('profile','DashboardController@profile')->name('profile');
Route::get('profiles','ProfilesController@index')->name('profiles');
Route::post('/profile/{id}','ProfilesController@update')->name('update.profile');
Route::get('/profile/{id}','ProfilesController@show')->name('view_profile');
Route::get('/profile/block/{id}','ProfilesController@block')->name('block');
Route::get('/profile/unblock/{id}','ProfilesController@unblock')->name('unblock');
Route::get('/profile/delete/{id}','ProfilesController@delete')->name('delete.user');

//Auth Routes
Auth::routes();
//Articles route
Route::get('/article','ArticlesController@index')->name('articles.index');
Route::get('/article/create','ArticlesController@create')->name('articles.create');
Route::post('/article','ArticlesController@store')->name('articles.store');
Route::get('/article/show/{id}','ArticlesController@show')->name('articles.show');
Route::get('/article/edit/{id}','ArticlesController@edit')->name('articles.edit');
Route::put('/article/update/{id}','ArticlesController@update')->name('articles.update');
Route::delete('/article/destroy/{id}','ArticlesController@destroy')->name('articles.destroy');

//CKeditor route
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
// Notifications
Route::get('/notifications','NotificationController@index');
Route::get('/notifications/update/{id}','NotificationController@update')->name('notification_update');
Route::get('/notifications/delete/{id}','NotificationController@destroy')->name('notification_delete');

Route::get('/error',function(){
    return view('error');
});

