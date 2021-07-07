<?php

use Illuminate\Support\Facades\Route;

Route::get('przyjaciele', 'FriendController@index')->name('friend.index');
