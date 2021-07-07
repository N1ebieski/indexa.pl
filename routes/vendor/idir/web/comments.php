<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('komentarz/{dir}/dodaj', 'Comment\Dir\CommentController@create')
        ->middleware(['icore.ban.user', 'icore.ban.ip', 'permission:web.comments.create|web.comments.suggest'])
        ->name('comment.dir.create')
        ->where('dir', '[0-9]+');
    Route::post('komentarz/{dir}', 'Comment\Dir\CommentController@store')
        ->middleware(['icore.ban.user', 'icore.ban.ip', 'permission:web.comments.create|web.comments.suggest'])
        ->name('comment.dir.store')
        ->where('dir', '[0-9]+');
});
