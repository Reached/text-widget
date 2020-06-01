<?php

Route::group(['middleware' => ['web', 'auth']], function() {
    Route::patch(config('text-widget.route-path'), 'Reached\TextWidget\TextWidgetController@update');
});
