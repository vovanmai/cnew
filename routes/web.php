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
Route::pattern('slug','(.*)');
Route::pattern('id','([0-9]*)');

Route::group(['namespace'=>'Cnews'],function(){
	Route::get('',[
		'uses'=>'IndexController@index',
		'as'  =>'cnews.index.index'
		]);	

	Route::get('{slug}-{id}',[
		'uses'=>'NewsController@cat',
		'as'  =>'cnews.news.cat'
		]);

	Route::get('{slug}-{id}.html',[
		'uses'=>'NewsController@detail',
		'as'  =>'cnews.news.detail'
		]);

	Route::get('add',[
		'uses'=>'NewsController@create',
		'as'  =>'cnews.index.create'
		]);

	Route::post('',[
		'uses'=>'NewsController@store',
		'as'  =>'cnews.index.store'
		]);

	Route::post('add',[
		'uses'=>'NewsController@store',
		'as'  =>'cnews.news.store'
		]);

});









Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth'],function(){
	//Danh muc tin
	Route::group(['prefix'=>'cat','middleware'=>'role:admin'],function(){

		Route::get('',[
			'uses'=>'CatController@index',
			'as'  =>'admin.cat.index'
		]);	
	// store <=> thêm
		Route::get('add',[
			'uses'=>'CatController@create',
			'as'  =>'admin.cat.add'
		]);
		Route::post('add',[
			'uses'=>'CatController@store',
			'as'  =>'admin.cat.add'
		]);
	//Get edit
    //POST update	

		Route::get('edit/{id}',[
			'uses'=>'CatController@edit',
			'as'  =>'admin.cat.edit'
		]);
		Route::post('edit/{id}',[
			'uses'=>'CatController@update',
			'as'  =>'admin.cat.edit'
		]);

		Route::get('del/{id}',[
			'uses'=>'CatController@destroy',
			'as'  =>'admin.cat.del'
		]);

		Route::post('',[
			'uses'=>'CatController@postDel',
			'as'  =>'admin.cat.postDel'
		]);

	});

	Route::group(['prefix'=>'news'],function(){
		Route::get('',[
			'uses'=>'NewsController@index',
			'as'  =>'admin.news.index'
		]);	
	// store <=> thêm
		Route::get('add',[
			'uses'=>'NewsController@create',
			'as'  =>'admin.news.create'
		]);
			Route::post('add',[
			'uses'=>'NewsController@store',
			'as'  =>'admin.news.store'
		]);
		Route::get('del/{id}',[
			'uses'=>'NewsController@destroy',
			'as'  =>'admin.news.destroy'
		]);
			Route::post('',[
			'uses'=>'NewsController@postDel',
			'as'  =>'admin.news.postDel'
		]);


			Route::post('edit/{id}',[
			'uses'=>'NewsController@update',
			'as'  =>'admin.news.update'
		]);
		Route::get('edit/{id}',[
			'uses'=>'NewsController@edit',
			'as'  =>'admin.news.edit'
		]);

	});

	Route::group(['prefix'=>'users'],function(){
		Route::get('',[
			'uses'=>'UsersController@index',
			'as'  =>'admin.users.index'	
			]);
		Route::get('add',[
			'uses'=>'UsersController@create',
			'as'  =>'admin.users.create'	
			]);

		Route::post('add',[
			'uses'=>'UsersController@store',
			'as'  =>'admin.users.store'	
			]);

		Route::get('edit/{id}',[
			'uses'=>'UsersController@edit',
			'as'  =>'admin.users.edit'	
			]);
		Route::post('edit/{id}',[
			'uses'=>'UsersController@update',
			'as'  =>'admin.users.update'	
			]);

		Route::get('del/{id}',[
			'uses'=>'UsersController@destroy',
			'as'  =>'admin.users.destroy'	
			]);
	});
	

});

Route::group(['namespace'=>'Auth'],function(){
	Route::get('login',[
		'uses'=>'AuthController@getLogin',
		'as'  =>'auth.auth.login'	
		]);

	Route::post('login',[
		'uses'=>'AuthController@postLogin',
		'as'  =>'auth.auth.login'	
		]);

	Route::get('logout',[
		'uses'=>'AuthController@logout',
		'as'  =>'auth.auth.logout'	
		]);
	Route::get('noaccess',function(){
		return view('auth.noaccess');
	});
	Route::get('noaccess1',function(){
		return view('auth.noaccess1');
	});

});


Route::group(['namespace'=>'Admin'],function(){
	Route::post('ajax',[
		'uses'=>'NewsController@getAjax',
		'as'  =>'admin.news.ajax'	
		]);

	
});

//làm lỗi 404
//chức năng quên password
//migrations
//ajax

// Route::get('(*)', function(){
// 	return view('errors.404');
// });
	
	Route::get('/demo',function(){
    return bcrypt("13578");
});