<?php

use Illuminate\Support\Facades\Route;

Route::get('platnosc/{payment_dir_pending}', 'Payment\Dir\PaymentController@show')
    ->where('payment_dir_pending', '[0-9A-Za-z-]+')
    ->name('payment.dir.show');

Route::get('platnosc/complete', 'Payment\Dir\PaymentController@complete')
    ->name('payment.dir.complete');
