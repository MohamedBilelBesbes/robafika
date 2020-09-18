<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Controller@toWelcome')->name('welcome');
Route::get('/about', 'Controller@toAbout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@destroy');
Route::delete('/home', 'HomeController@destroy')->name('user.destructor');

Route::get('/productList', 'ProductProfileController@index')->name('products.list');

Route::get('/userList', 'UserProfileController@index')->name('users.list');

Route::get('/userProfile', 'UserProfileController@toUserProfile')->name('get.userprofile');
Route::post('/userProfile','UserProfileController@store')->name('user.profile');

Route::get('/updateUser', 'UserProfileController@getuser')->name('get.userupdate');
Route::post('/updateUser','UserProfileController@update')->name('user.update');

Route::get('/productProfile', 'ProductProfileController@toProductProfile')->name('userprofile.direction');
Route::post('/productProfile','ProductProfileController@store')->name('product.profile');

Route::get('/updateProduct', 'ProductProfileController@prepareUpdate')->name('product.prepareUpdate');
Route::post('/updateProduct', 'ProductProfileController@update')->name('product.update');

Route::get('/acceptOffer', 'OfferController@Update');
Route::post('/acceptOffer', 'OfferController@update')->name('offer.accept');

Route::get('/productDelete', 'ProductProfileController@destroy');
Route::post('/productDelete', 'ProductProfileController@destroy');
Route::delete('/productDelete', 'ProductProfileController@destroy')->name('product.delete');

Route::get('/displayUserProducts', 'UserProfileController@Funcdisplayproducts')->name('user.products');
Route::get('/displayMyProducts', 'UserProfileController@Funcdisplaymyproducts')->name('my.products');

Route::get('/displayproduct', 'ProductProfileController@Funcdisplayproduct')->name('product.onedisplay');
Route::post('/displayproduct', 'OfferController@store')->name('make.offer');

Route::get('/displayOffers', 'OfferController@Funcdisplayoffers')->name('offers.display');

Route::get('/displayMyOffers', 'OfferController@Funcdisplaymyoffers')->name('display.myoffers');

Route::get('/displayRecievedOffers', 'OfferController@Funcdisplayrecievedoffers')->name('display.recievedoffers');

Route::get('/emailVerification', 'Controller@FuncEmailVerification')->name('email.verification');
Route::get('/emailVerified', 'Controller@FuncEmailVerified')->name('email.verified');