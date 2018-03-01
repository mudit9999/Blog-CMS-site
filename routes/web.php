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

Route::get('/test', function (){
    return App\User::find(1)->profile;
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['middleware' => 'auth'],function (){

    Route::get('/home', 'HomeController@index');

    Route::get('/post/create',[

        'uses'=>'PostsController@create',
        'as'=>'post.create'

    ]);

    Route::post('post/store',[

        'uses'=>'PostsController@store',
        'as'=>'post.store'

    ]);

    Route::get('post/delete/{id}',[

        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'

    ]);
    Route::get('/posts',[

        'uses'=>'PostsController@index',
        'as'=>'posts'
    ]);
    Route::get('/posts/trashed',[

        'uses'=>'PostsController@trashed',
        'as'=>'posts.trashed'
    ]);

    Route::get('/posts/kill/{id}',[

        'uses'=>'PostsController@kill',
        'as'=>'posts.kill'
    ]);

    Route::get('/posts/restore/{id}',[

        'uses'=>'PostsController@restore',
        'as'=>'posts.restore'
    ]);

    Route::get('/posts/edit/{id}',[

        'uses'=>'PostsController@edit',
        'as'=>'posts.edit'
    ]);

    Route::post('/posts/update/{id}',[

        'uses'=>'PostsController@update',
        'as'=>'posts.update'
    ]);

    Route::get('/category/create',[

        'uses'=>'CategoriesController@create',
        'as'=>'category.create'

    ]);

    Route::get('/categories',[

        'uses'=>'CategoriesController@index',
        'as'=>'categories'

    ]);

    Route::post('/category/store',[

        'uses'=>'CategoriesController@store',
        'as'=>'category.store'

    ]);

    Route::get('/category/edit/{id}',[

        'uses'=>'CategoriesController@edit',
        'as'  =>'category.edit'

        ]);

    Route::get('/category/delete/{id}',[

        'uses'=>'CategoriesController@destroy',
        'as'  =>'category.delete'
    ]);

    Route::post('/category/update/{id}',[

        'uses'=>'CategoriesController@update',
        'as'  =>'category.update'
    ]);

    Route::get('/tags',[
        'uses'=>'TagsController@index',
        'as'=>'tags'

    ]);

    Route::get('/tag/edit/{id}',[
        'uses'=>'TagsController@edit',
        'as'=>'tag.edit'

    ]);
    Route::post('/tag/update/{id}',[
        'uses'=>'TagsController@update',
        'as'=>'tag.update'

    ]);
    Route::get('/tag/delete/{id}',[
        'uses'=>'TagsController@destroy',
        'as'=>'tag.delete'

    ]);
    Route::get('/tag/create',[
        'uses'=>'TagsController@create',
        'as'=>'tag.create'

    ]);
    Route::post('/tag/store',[
        'uses'=>'TagsController@store',
        'as'=>'tag.store'
    ]);

    Route::get('/users',[
        'uses'=>'UsersController@index',
        'as' =>'users'

    ]);

    Route::get('/users/create',[
        'uses'=>'UsersController@create',
        'as' =>'users.create'

    ]);

    Route::post('/users/store',[
        'uses'=>'UsersController@store',
        'as' =>'user.store'

    ]);

    Route::get('/users/admin/{id}',[
        'uses'=>'UsersController@admin',
        'as' =>'user.admin'

    ])->middleware('admin');

    Route::get('user/delete/{id}',[
        'uses'=>'UsersController@destroy',
        'as'=>'user.delete'

    ]);

    Route::get('/users/not-admin/{id}',[
        'uses'=>'UsersController@not_admin',
        'as' =>'user.not_admin'

    ]);
    Route::get('/users/profile',[
       'uses'=>'ProfilesController@index',
       'as'=>'user.profile'

    ]);
    Route::get('/users/profile/update',[
        'uses'=>'ProfilesController@update',
        'as'=>'user.profile.update'

    ]);


});

