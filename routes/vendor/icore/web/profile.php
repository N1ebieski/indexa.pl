<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('symlink/{provider}', 'Profile\SocialiteController@redirect')
        ->name('profile.socialite.redirect')->where('provider', '[A-Za-z]+');
    Route::get('symlink/{provider}/callback', 'Profile\SocialiteController@callback')
        ->name('profile.socialite.callback')->where('provider', '[A-Za-z]+');

    Route::delete('symlink/socialites/{socialite}', 'Profile\SocialiteController@destroy')
        ->name('profile.socialite.destroy')->middleware('can:delete,socialite')
        ->where('socialite', '[0-9]+');

    Route::get('profile/edit', 'Profile\ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'Profile\ProfileController@update')->name('profile.update');

    Route::get('profile/edycja/social', 'Profile\ProfileController@editSocialite')
        ->name('profile.edit_socialite');

    Route::get('profil/edycja/haslo', 'Profile\ProfileController@redirectPassword')
        ->name('profile.redirect_password')->middleware('verified');

    Route::patch('profil/email', 'Profile\ProfileController@updateEmail')
        ->name('profile.update_email');
});
