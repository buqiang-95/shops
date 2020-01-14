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

Route::get('/', function () {

    return view('welcome');
});
// //闭包路由
// Route::get('/hello', function () {
//     return '你好';
// });
// Route::get('/cs','IndexController@test');
// Route::view('/login','login');
// Route::post('/dologin','IndexController@do_login');
// //Route::get('/list','StudentController@getlist');
// Route::get('/csd/{id}','StudentController@list')->where('id','[0-9]+');
// Route::get('/ass/{name}','StudentController@asfr');




//品牌
Route::prefix('brand')->group(function(){
Route::get('create','admin\BrandController@create');
Route::post('store','admin\BrandController@store');
Route::get('/','admin\BrandController@index');
Route::get('edit/{id}','admin\BrandController@edit');
Route::post('update/{id}','admin\BrandController@update');
Route::get('delete/{id}','admin\BrandController@destroy');
Route::get('checkOnly','admin\BrandController@checkOnly');
});
//学生
Route::prefix('student')->group(function(){
Route::get('create','KyController@create');
Route::post('store','KyController@store');
Route::get('/','KyController@index');
Route::get('edit/{id}','KyController@edit');
Route::post('update/{id}','KyController@update');
Route::get('delete/{id}','KyController@destroy');
});
Route::prefix('yuan')->group(function(){
Route::get('create','admin\YuanController@create');
Route::post('store','admin\YuanController@store');
Route::get('/','admin\YuanController@index');
Route::get('edit/{id}','admin\YuanController@edit');
Route::post('update/{id}','admin\YuanController@update');
Route::get('delete/{id}','admin\YuanController@destroy');
});
//books
Route::prefix('books')->group(function(){
Route::get('create','BooksController@create');
Route::post('store','BooksController@store');
Route::get('/','BooksController@index');
Route::get('edit/{id}','BooksController@edit');
Route::post('update/{id}','BooksController@update');
Route::get('delete/{id}','BooksController@destroy');
});
//无限极分类
Route::prefix('cate')->group(function(){
Route::get('create','admin\CategroyController@create');
Route::post('store','admin\CategroyController@store');
Route::get('list','admin\CategroyController@index');
Route::get('edit/{id}','admin\CategroyController@edit');
Route::post('update/{id}','admin\CategroyController@update');
Route::get('delete/{id}','admin\CategroyController@destroy');
});
//新闻分类
// Route::prefix('fenlei')->group(function(){
// Route::get('create','FenController@create');
// Route::post('store','FenController@store');
// Route::get('list','FenController@index');
// Route::get('edit/{id}','FenController@edit');
// Route::post('update/{id}','FenController@update');
// Route::get('delete/{id}','FenController@destroy');
// });
Route::prefix('user')->group(function(){
Route::get('login','UserController@login');
Route::post('do_login','UserController@do_login');
Route::get('logout','UserController@logout');
});
Route::prefix('wen')->group(function(){
Route::get('create','WenController@create');
Route::post('store','WenController@store');
Route::get('/','WenController@index');
Route::get('edit/{id}','WenController@edit');
Route::post('update/{id}','WenController@update');
Route::get('delete/{id}','WenController@destroy');
});
// Route::prefix('user')->group(function(){
// Route::get('login','UserController@login');
// Route::post('do_login','UserController@do_login');
// Route::get('logout','UserController@logout');
// });
Route::prefix('goods')->group(function(){
Route::get('create','GoodsController@create');
Route::post('store','GoodsController@store');
Route::get('/','GoodsController@index');
Route::get('edit/{id}','GoodsController@edit');
Route::post('update/{id}','GoodsController@update');
Route::get('delete/{id}','GoodsController@destroy');
});
Route::prefix('xiaoqu')->middleware('checklogin')->group(function(){
Route::get('create','xiaoqu\XiaoController@create');
Route::post('store','xiaoqu\XiaoController@store');
Route::get('/','xiaoqu\XiaoController@index');
Route::get('edit/{id}','xiaoqu\XiaoController@edit');
Route::post('update/{id}','xiaoqu\XiaoController@update');
Route::get('delete/{id}','xiaoqu\XiaoController@destroy');
Route::get('show/{id}','xiaoqu\XiaoController@show');

});


Route::get('send','GoodsController@sendemail');

Route::prefix('login')->group(function(){
Route::get('login','xiaoqu\LoginController@login');
Route::post('do_login','xiaoqu\LoginController@do_login');
Route::get('logout','xiaoqu\LoginController@logout');
});

Route::prefix('kuguan')->middleware('checkdeng')->group(function(){
Route::get('create','kuguan\KuController@create');
Route::post('store','kuguan\KuController@store');
Route::get('/','kuguan\KuController@index');
Route::get('edit/{id}','kuguan\KuController@edit');
Route::post('update/{id}','kuguan\KuController@update');
Route::get('delete/{id}','kuguan\KuController@destroy');
});
Route::prefix('kuguan')->group(function(){
Route::get('login','kuguan\LoginController@login');
Route::post('do_login','kuguan\LoginController@do_login');
Route::get('logout','kuguan\LoginController@logout');
});
Route::prefix('liuyan')->middleware('checklas')->group(function(){
Route::get('create','liuyan\LiuyanController@create');
Route::post('store','liuyan\LiuyanController@store');
Route::get('/','liuyan\LiuyanController@index');
Route::get('edit/{id}','liuyan\LiuyanController@edit');
Route::post('update/{id}','liuyan\LiuyanController@update');
Route::get('delete/{id}','liuyan\LiuyanController@destroy');
Route::get('click_num','liuyan\LiuyanController@click_num');
});
Route::prefix('liuyan')->group(function(){
Route::get('login','liuyan\LoginController@login');
Route::post('do_login','liuyan\LoginController@do_login');
Route::get('logout','liuyan\LoginController@logout');
});