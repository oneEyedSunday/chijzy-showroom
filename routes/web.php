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

Route::get('/test', function(){
	$img = Image::make('foo.jpg')->resize(300,200);
	return $img->response('jpg');
});

Route::get('/test/watermark', function(){
	$img = Image::make('Cover.jpg')->insert('owner/chijzy2020.png', 'bottom-left')->save('watermarked.jpg');
	$send = Image::make('watermarked.jpg');
	return $send->response('jpg');
});

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
Auth::routes();

Route::get('albums/{tag?}', 'PagesController@getAlbums')->name('albums.show');
Route::get('photos/{tag?}', 'PagesController@getPhotos')->name('photos.show');
Route::get('contact', 'PagesController@getContact')->name('contact.show');
Route::get('/', 'PagesController@index')->name('landing');

// manage routes
Route::prefix('manage')->middleware('auth')->group(function(){
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::get('/frontend', 'ManageController@managefront')->name('manage.frontend');
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

// filter routes for front end