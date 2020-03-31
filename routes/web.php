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
use Illuminate\Http\Resources\Json\Resource;
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/search', 'FrontController@search')->name('search');

Route::get('/', 'FrontController@homepage');

Route::get('/{slug}', 'FrontController@singlePost')->name('single');

Route::get('/category/{slug}', 'FrontController@category')->name('category');

Route::get('/writer/{slug}', 'FrontController@writer')->name('writer');

Route::get('/contact', function () {
    return view('frontend.pages.contact');
});

Route::get('/videos', function () {
    return view('frontend.pages.videos');
});

Route::post('/comments', 'CommentController@store')->name('commentstore');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/dashboard', function(){
        return view('admin.pages.index');
    });

    Route::get('parentcategories', 'CategoryController@getParentController')->name('parentCategories');

    Route::resource('category', 'CategoryController');

    Route::get('last','CategoryController@lastData')->name('lastData');

    Route::get('/categoryedit/{slug}', 'CategoryController@editCategory')->name('editCategory');

    Route::get('/fileupload', function(){
        return view('admin.pages.fileupload');
    });

    Route::resource('posts', 'PostController');

    Route::resource('users', 'UserController');

    Route::resource('social', 'SocialController');

    Route::resource('website', 'WebsiteController');

    Route::get('/approve-comments', 'CommentController@approveComment')->name('approve_comment');

    Route::get('/comments/{id}/edit', 'CommentController@edit')->name('edit_comment');

    Route::get('/unapprove-comments', 'CommentController@unapproveComment')->name('unapprove_comment');

    Route::patch('/comments/{id}', 'CommentController@update')->name('update_comment');

    Route::delete('/comments/{id}', 'CommentController@destroy')->name('update_delete');

    Route::get('/sensitive', function(){
        return view('admin.pages.sensitive');
    });

});

Route::group(['prefix' => 'editor', 'middleware' => ['auth', 'editor']], function() {
    Route::get('/dashboard', function(){
        return view('admin.pages.editor');
    });

    Route::get('/fileupload', function(){
        return view('admin.pages.fileupload');
    });

});
