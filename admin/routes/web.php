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

Route::middleware('auth')->get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');



//--------------------------- ADs Route -------------------------------------------

Route::get('/home/Ads', 'AdsController@all_ads')->name('ads');
Route::get('/home/ApprovedAds', 'AdsController@approvedAds')->name('approvedAds');
Route::get('/home/showAd/{Ads}', 'AdsController@show')->name('show');
Route::get('/home/ApprovedAds/{Ads}', 'AdsController@approved')->name('approved');

Route::delete('/home/ApprovedAds', 'AdsController@delete')->name('Ad_delete');

Route::get('/home/DeletedAds', 'AdsController@deletedAds')->name('deletedAds');


//---------------------------- Sellers Route ---------------------------------------

Route::get('/home/Sellers', 'SellersController@view')->name('Sellers');
Route::get('/home/SellersDetails/{Sellers}', 'SellersController@Details')->name('SellersDetails');


//---------------------------- images Route -----------------------------------------


Route::get('imgApprove/{carad_id}/{img_id}', 'imageController@approveImg')->name('imgApprove');
Route::get('imgReject/{carad_id}/{img_id}','imageController@rejectImg')->name('imgReject');