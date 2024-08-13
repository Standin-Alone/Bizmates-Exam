<?php

use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>'/home'],function(){
    Route::get('/{place}','VenuesController@index')->name('venues.index');  
    Route::get('/{place}/{venue_id}','VenuesController@view_venue')->name('view_venue.index');      
});

