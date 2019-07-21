<?php

Route::get('/', [
    'uses' => 'OffersController@index',
    'as' => 'Offers.index',
]);


Route::group(['prefix' => 'Offers'], function () {
    Route::get('/chart', [
        'uses' => 'OffersController@chart',
        'as'   => 'Offers.chart',
    ]);
    Route::get('/search', [
        'uses' => 'OffersController@action',
        'as'   => 'Offers.action',
    ]);
    Route::get('/{id}', [
        'uses' => 'OffersController@show',
        'as'   => 'Offers.show',
    ]);

    Route::post('/', [
        'uses' => 'OffersController@store',
        'as'   => 'Offers.store',
    ]);

    Route::put('/{id}', [
        'uses' => 'OffersController@update',
        'as'   => 'Offers.update',
    ]);





});
//Route::resource('offer','OffersController');