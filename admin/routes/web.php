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



//-------------------------------- Vehicle-Details Routes --------------------------------------

        //------ Vehicle Features---------------------------------//
            Route::resource('VehicleFeatures','VehicleDetails\featureController');
            Route::get('VehicleFeatures/show', 'VehicleDetails\featureController@show')->name('VehicleFeatures.show');
            Route::post('VehicleFeatures/destroy', 'VehicleDetails\featureController@destroy')->name('VehicleFeatures.destroy');
            Route::post('VehicleFeatures/edit', 'VehicleDetails\featureController@edit')->name('VehicleFeatures.edit');
            Route::post('VehicleFeatures/update', 'VehicleDetails\featureController@update')->name('VehicleFeatures.update');
            Route::post('VehicleFeatures/store', 'VehicleDetails\featureController@store')->name('VehicleFeatures.store');    

        //------ Vehicle makes---------------------------------//
            Route::resource('VehicleMakes','VehicleDetails\makeController');
            Route::get('VehicleMakes/show', 'VehicleDetails\makeController@show')->name('VehicleMakes.show');
            Route::post('VehicleMakes/destroy', 'VehicleDetails\makeController@destroy')->name('VehicleMakes.destroy');
            Route::post('VehicleMakes/edit', 'VehicleDetails\makeController@edit')->name('VehicleMakes.edit');
            Route::post('VehicleMakes/update', 'VehicleDetails\makeController@update')->name('VehicleMakes.update');
            Route::post('VehicleMakes/store', 'VehicleDetails\makeController@store')->name('VehicleMakes.store');  
        
        //------ Vehicle model---------------------------------//
            Route::resource('VehicleModel','VehicleDetails\modelController');
            Route::get('VehicleModel/show', 'VehicleDetails\modelController@show')->name('VehicleModel.show');
            Route::post('VehicleModel/destroy', 'VehicleDetails\modelController@destroy')->name('VehicleModel.destroy');
            Route::post('VehicleModel/edit', 'VehicleDetails\modelController@edit')->name('VehicleModel.edit');
            Route::post('VehicleModel/update', 'VehicleDetails\modelController@update')->name('VehicleModel.update');
            Route::post('VehicleModel/store', 'VehicleDetails\modelController@store')->name('VehicleModel.store');       

        //------ Vehicle Variant---------------------------------//
            Route::resource('VehicleVariant','VehicleDetails\variantController');
            Route::get('VehicleVariant/show', 'VehicleDetails\variantController@show')->name('VehicleVariant.show');
            Route::post('VehicleVariant/destroy', 'VehicleDetails\variantController@destroy')->name('VehicleVariant.destroy');
            Route::post('VehicleVariant/edit', 'VehicleDetails\variantController@edit')->name('VehicleVariant.edit');
            Route::post('VehicleVariant/update', 'VehicleDetails\variantController@update')->name('VehicleVariant.update');
            Route::post('VehicleVariant/store', 'VehicleDetails\variantController@store')->name('VehicleVariant.store'); 

        //------ Vehicle Derivative---------------------------------//
            Route::resource('VehicleDerivative','VehicleDetails\derivativeController');
            Route::get('VehicleDerivative/show', 'VehicleDetails\derivativeController@show')->name('VehicleDerivative.show');
            Route::post('VehicleDerivative/destroy', 'VehicleDetails\derivativeController@destroy')->name('VehicleDerivative.destroy');
            Route::post('VehicleDerivative/edit', 'VehicleDetails\derivativeController@edit')->name('VehicleDerivative.edit');
            Route::post('VehicleDerivative/update', 'VehicleDetails\derivativeController@update')->name('VehicleDerivative.update');
            Route::post('VehicleDerivative/store', 'VehicleDetails\derivativeController@store')->name('VehicleDerivative.store');     

        //------ Vehicle BodyType---------------------------------//
            Route::resource('VehicleBodytype','VehicleDetails\BodytypeController');
            Route::get('VehicleBodytype/show', 'VehicleDetails\BodytypeController@show')->name('VehicleBodytype.show');
            Route::post('VehicleBodytype/destroy', 'VehicleDetails\BodytypeController@destroy')->name('VehicleBodytype.destroy');
            Route::post('VehicleBodytype/edit', 'VehicleDetails\BodytypeController@edit')->name('VehicleBodytype.edit');
            Route::post('VehicleBodytype/update', 'VehicleDetails\BodytypeController@update')->name('VehicleBodytype.update');
            Route::post('VehicleBodytype/store', 'VehicleDetails\BodytypeController@store')->name('VehicleBodytype.store');    
         
        //------ Vehicle Fueltype---------------------------------//
            Route::resource('VehicleFueltype','VehicleDetails\FueltypeController');
            Route::get('VehicleFueltype/show', 'VehicleDetails\FueltypeController@show')->name('VehicleFueltype.show');
            Route::post('VehicleFueltype/destroy', 'VehicleDetails\FueltypeController@destroy')->name('VehicleFueltype.destroy');
            Route::post('VehicleFueltype/edit', 'VehicleDetails\FueltypeController@edit')->name('VehicleFueltype.edit');
            Route::post('VehicleFueltype/update', 'VehicleDetails\FueltypeController@update')->name('VehicleFueltype.update');
            Route::post('VehicleFueltype/store', 'VehicleDetails\FueltypeController@store')->name('VehicleFueltype.store');     

        //------ Vehicle Transmission---------------------------------//
            Route::resource('VehicleTransmission','VehicleDetails\TransmissionController');
            Route::get('VehicleTransmission/show', 'VehicleDetails\TransmissionController@show')->name('VehicleTransmission.show');
            Route::post('VehicleTransmission/destroy', 'VehicleDetails\TransmissionController@destroy')->name('VehicleTransmission.destroy');
            Route::post('VehicleTransmission/edit', 'VehicleDetails\TransmissionController@edit')->name('VehicleTransmission.edit');
            Route::post('VehicleTransmission/update', 'VehicleDetails\TransmissionController@update')->name('VehicleTransmission.update');
            Route::post('VehicleTransmission/store', 'VehicleDetails\TransmissionController@store')->name('VehicleTransmission.store');    