<?php

use Illuminate\Support\Facades\Route;




Route::get('cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
//    Artisan::call('optimize');
    die("Cache Cleared");
});



Route::group(['namespace' => 'Front'], function(){
	Route::get('/', 'IndexController@index');

	Route::get('/pricing', 'IndexController@pricing');
	Route::get('/faq', 'IndexController@faq');
	Route::get('/blog', 'IndexController@blog');
	Route::get('/blog/{id}', 'IndexController@blogs');
});




Route::group(['namespace' => 'User'], function(){
	Route::match(['get', 'post'], '/login', 'UserController@login');
	Route::match(['get', 'post'], '/register', 'UserController@register');
});


Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => ['Auth' => 'CheckUser']], function(){

	Route::get('/dashboard', 'UserController@dashboard');
	Route::get('/profile', 'UserController@profile');
	Route::post('profile/update/{id}', 'UserController@update');
	Route::get('password', 'UserController@password');
	Route::post('password/update', 'UserController@update_password');

	Route::get('logout', 'UserController@logout');
	Route::get('cancel', 'UserController@cancel');
	

	Route::get('create-links', 'ShortenerController@create_links');
	Route::post('create-links', 'ShortenerController@store_links');
	Route::get('view-links', 'ShortenerController@view_links');
	Route::get('delete-links/{id}', 'ShortenerController@delete_links');
	

	/*Free CRUD*/
	Route::get('create-free', 'ShortenerController@create_free');
	Route::post('create-free', 'ShortenerController@store_free');
	Route::get('shortener-links', 'ShortenerController@links');


	/*Tags Crud*/
	Route::get('create-tag', 'TagController@create');
	Route::post('create-tag', 'TagController@store');
	Route::get('/view-tag', 'TagController@view');
	Route::get('/delete-tags/{id}', 'TagController@delete');
	
	/*Trace Link*/
	Route::get('/trace-link/{id}', 'ShortenerController@trace');
	

	// for Initiate the order
	Route::post('/payments','PaymentController@Initiate');
	// for Payment complete
	Route::post('/payment-complete','PaymentController@Complete');




	
});




Route::group(['namespace' => 'Admin'], function(){
	Route::match(['get', 'post'], '/admin/login', 'AdminController@login');
	Route::post('contact', 'ContactController@contact');
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['Auth' => 'CheckAdmin']], function(){

	Route::get('/dashboard', 'AdminController@dashboard');

	Route::get('/profile', 'AdminController@profile');
	Route::post('profile/update/{id}', 'AdminController@update');
	Route::get('password', 'AdminController@password');
	Route::post('password/update', 'AdminController@update_password');
	Route::get('logout', 'AdminController@logout');
	

	Route::get('create-links', 'ShortenerController@create_links');
	Route::get('view-links', 'ShortenerController@view_links');
	Route::get('delete-links/{id}', 'ShortenerController@delete_links');
	Route::get('shortener-links', 'ShortenerController@links');

	/*Users*/
	Route::get('users', 'UserController@index');
	Route::get('delete-user/{id}', 'UserController@delete_user');
	

	/*Users Payments*/
	Route::get('payments', 'UserController@payments');
	Route::get('delete-payments/{id}', 'UserController@delete_payments');

	/*Users Contacts*/
	Route::get('contacts', 'ContactController@contacts');
	Route::get('delete-contacts/{id}', 'ContactController@delete_contacts');


	/*Blog */
	Route::get('add-blog', 'BlogController@create');
	Route::post('add-blog', 'BlogController@store');
	Route::get('view-blog', 'BlogController@view');
	Route::get('delete-blog/{id}', 'BlogController@del_blog');




	
});
Route::group(['namespace' => 'Front'], function(){
	Route::post('/', 'IndexController@shortener');
	Route::get('/{link}', 'IndexController@link');
});





























/*Clear Cashe*/
Route::get('cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
//    Artisan::call('optimize');
    die("Cache Cleared");
});

/*Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');*/
