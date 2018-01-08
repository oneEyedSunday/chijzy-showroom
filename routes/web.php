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


Route::get('/fish/{filename}', function($filename){
	// $file = Storage::disk('public')->get('uploads/' . $filename);

	// if(!File::exists($file)){
	// 	abort(404);
	// }
	
 //    return new Response($file, 200);
	$path = storage_path('app/public/uploads/'. $filename);
	$file = File::get($path);
	$type = File::mimeType($path);
	$response = Response::make($file, 200);
	$response->header('Content-Type', $type);
	return $response;
});

// replace with custom
// removing register
// Auth::routes();

Route::get('albums/{tag?}', 'PagesController@getAlbums')->name('albums.show');
Route::get('album/{slug}', 'PagesController@MediaInAlbum')->where('slug', '[\w\d\-\_]+')->name('album.single');
Route::get('photos/{tag?}', 'PagesController@getPhotos')->name('photos.show');
Route::get('photo/{slug}', 'PagesController@getPhoto')->where('slug', '[\w\d\-\_]+')->name('photo.single');
Route::get('designs/{tag?}', 'PagesController@getDesigns')->name('designs.show');
Route::get('design/{slug}', 'PagesController@getDesign')->where('slug', '[\w\d\-\_]+')->name('design.single');
Route::get('contact', 'PagesController@getContact')->name('contact.show');
Route::post('contact', 'PagesController@postContact')->name('contact.post');
Route::get('album/{album_id}', 'PagesController@MediaInAlbum')->name('album.show');
Route::get('albums', 'PagesController@getAlbums')->name('albums.list');
Route::get('/', 'PagesController@index')->name('landing');

// manage routes
Route::prefix('manage')->middleware('auth')->group(function(){
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::post('/dashboard', 'UpdateUserController@update')->name('manage.update');
	Route::get('/frontend', 'ManageController@managefront')->name('manage.frontend');
	Route::post('/frontend', 'ManageController@postfront')->name('manage.set.frontend');
	Route::post('/frontend/maxcarousel', 'ManageController@setfromFrontEnd')->name('manage.set.maxcarousel');
});

Route::prefix('manage/media')->middleware('auth')->group(function(){
	Route::get('/add/{album_id?}', 'MediaController@create')->name('media.add');
	Route::post('/add', 'MediaController@store')->name('media.add.post');
	Route::get('/all', 'MediaController@index')->name('media.all');
	Route::get('/view/{media_id}', 'MediaController@show')->name('media.single.show');
	Route::get('/edit/{media_id}', 'MediaController@edit')->name('media.single.edit');
	Route::put('/edit/{media_id}', 'MediaController@update')->name('media.single.update');
	Route::delete('/delete/{media_id}', 'MediaController@destroy')->name('media.single.delete');
});

Route::prefix('manage/album')->middleware('auth')->group(function(){
	Route::get('/add', 'AlbumController@create')->name('album.add');
	Route::post('/add', 'AlbumController@store')->name('album.add.post');
	Route::get('/all', 'AlbumController@index')->name('album.all');
	Route::get('/view/{album_id}', 'AlbumController@show')->name('album.single.show');
	Route::get('/edit/{album_id}', 'AlbumController@edit')->name('album.single.edit');
	Route::put('/edit/{album_id}', 'AlbumController@update')->name('album.single.update');
	Route::delete('/delete/{album_id}', 'AlbumController@destroy')->name('album.single.delete');
});

Route::prefix('manage/tags')->middleware('auth')->group(function(){
	Route::get('/all', 'TagController@index')->name('tags.all');
	Route::get('/view/{id}', 'TagController@show')->name('tags.show');
	Route::post('/edit', 'TagController@store')->name('tags.create');
	Route::get('/edit/{id}', 'TagController@edit')->name('tags.edit');
	Route::post('/edit/{id}', 'TagController@update')->name('tags.update');
	Route::delete('/delete/{id}', 'TagController@destroy')->name('tags.delete');
});

// filter routes for auth
        

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
Route::post('login', 'Auth\LoginController@login')->middleware('guest');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request')->middleware('guest');
Route::post('password/reset','Auth\ResetPasswordController@reset')->middleware('guest');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm ')->name('password.reset')->middleware('guest');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email')->middleware('guest');