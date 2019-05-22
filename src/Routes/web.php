<?php

Route::group([
        'middleware' => ['web', 'rb28dett.base', 'rb28dett.auth'],
        'prefix'     => config('rb28dett.settings.base_url'),
        'namespace'  => 'RB28DETT\Settings\Controllers',
        'as'         => 'rb28dett::',
    ], function () {
        Route::get('settings', 'SettingsController@index')->name('settings.index');
        Route::post('settings/update', 'SettingsController@update')->name('settings.general.update');
    });
