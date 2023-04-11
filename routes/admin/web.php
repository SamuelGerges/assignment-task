<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AlbumController;
Route::middleware('auth')->group(function () {

    Route::name('admin.')->prefix('admin')->group(function () {

        Route::get('/home', 'HomeController@index')->name('home');

        Route::prefix('albums')->group(function (){
            Route::get('/', 'AlbumController@showAlbum')->name('albums.showAlbum');
            Route::get('create-album', 'AlbumController@createAlbum')->name('albums.createAlbum');
            Route::post('store-album', 'AlbumController@storeAlbum')->name('albums.storeAlbum');
            Route::get('edit-album/{id}', 'AlbumController@editAlbum')->name('albums.editAlbum');
            Route::post('update-album/{id}', 'AlbumController@updateAlbum')->name('albums.updateAlbum');
            Route::get('delete-album-only/{id}', 'AlbumController@deleteAlbumOnly')->name('albums.deleteAlbumOnly');
            Route::get('delete-album-with-images/{id}', 'AlbumController@deleteAlbumWithAllImages')->name('albums.deleteAlbumWithImages');

        });

        Route::prefix('images')->group(function (){
            Route::get('show-image-album/{id}', 'ImageController@showImages')->name('images.showImages');
            Route::get('add/{id}', 'ImageController@AddImages')->name('images.AddImages');
            Route::post('save', 'ImageController@saveImages')->name('images.saveImages');
            Route::post('store/{id}', 'ImageController@storeImages')->name('images.storeImages');
            Route::get('edit-image/{id}', 'ImageController@editImage')->name('images.editImage');
            Route::post('update-image/{id}', 'ImageController@updateImage')->name('images.updateImage');
            Route::get('delete-image/{id}', 'ImageController@deleteImage')->name('images.deleteImage');
            Route::get('move-image/{id}', 'ImageController@moveImage')->name('images.moveImage');
            Route::post('update-move-image/{id}', 'ImageController@updateMoveImage')->name('images.updateMoveImage');

        });

    });
});



