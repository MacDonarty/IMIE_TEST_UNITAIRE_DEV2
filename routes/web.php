<?php

Route::get('/', 'MemberController@index')->middleware('web');
Route::post('/lists/create', 'MemberController@create')->middleware('web');
