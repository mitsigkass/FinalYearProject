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
/**
 * This is a Northumbria University Coursework.
 *
 *  @author mitsigkas
 */


Route::get('/', 'UsersController@index');

  Auth::routes(['verify'=>true]);

Route::group(['middleware' => ['auth', 'isUser']], function(){

Route::get('/home', 'HomeController@index')->name('home');
Route::get('myprofile', 'Frontend\UserController@myprofile')->middleware('verified');
Route::post('myprofile-update', 'Frontend\UserController@update')->middleware('verified');
Route::get('myads','Frontend\UserController@myads')->middleware('verified');
Route::post('myadsupdate/{id}', 'Frontend\UserController@myadsupdate')->middleware('verified');
Route::get('deletead/{id}', 'Frontend\UserController@deletead')->middleware('verified');

//To display select your category page
Route::get('post-classified-ads' , 'UsersController@postad')->middleware('verified');
//To display various views when category clicked
Route::get('/post-classified-ads/{maincategory}/{id}' , 'UsersController@categories')->middleware('verified');
//To post ads
Route::post('publishadvertisement' , 'UsersController@publishadvertisement')->middleware('verified');

});

Route::group(['middleware' => ['auth', 'isAdmin']], function(){
Route::get('/dashboard', function(){
    return view('admin.dashboard');

  });

  Route::get('registered-user','Admin\RegisteredController@index');
  Route::get('role-edit/{id}','Admin\RegisteredController@edit');
  Route::put('role-update/{id}','Admin\RegisteredController@updaterole');
  Route::get('user-delete/{id}','Admin\RegisteredController@delete');

  Route::get('registered-ads','Admin\AdsController@index');
  Route::get('product-delete/{id}','Admin\AdsController@delete');

  Route::get('reports','Admin\RegisteredController@reports');
  Route::get('reportdelete/{id}','Admin\RegisteredController@reportdelete');
});





//For fetching main categories
Route::post('UsersController/retrieve' , 'UsersController@retrieve')->name('categories.retrieve');

//For load all advertisements
Route::get('UsersController/getAds' , 'UsersController@getAds')->name('categories.ads');
//To view Ads
Route::get('/viewAds/{maincategory}/{id}' , 'UsersController@viewAds');
//To view Ads in subs
Route::get('/viewsubsads/{maincategoryid}/{subcategory}/{id}' , 'UsersController@viewsubsads');

//To search ads by product name
Route::post('/product/search' , 'UsersController@searchproduct');
//To view an advertisement
Route::get('/product/view/{id}' , 'UsersController@viewproduct');
//Contact us page
Route::get('contactus' , 'UsersController@contactus');
//About us page
Route::get('aboutus' , 'UsersController@aboutus');
//Email Verified page
Route::get('email/verified' , 'UsersController@email');
//Send report
Route::post('reportsend' , 'UsersController@reportsend');
