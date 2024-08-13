<?php

use Illuminate\Support\Facades\Route;


Route::get('/','OrderReportController@index')->name('order-report.index');
Route::get('/generate-report','OrderReportController@generate_report')->name('generate-report');