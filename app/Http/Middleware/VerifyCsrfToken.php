<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/checkout/payment/notify',
        '/paytm-callback',
        '/ssl/notify',
        '/ssl/cancle',
        'user/deposit/ssl/notify',
        '/flutter/notify',
        '/user/deposit/flutter/notify',
        '/user/flutter/payment/notify',
        '/the/genius/ocean/2441139',
        '/razorpay-callback',
        '/user/deposit/paytm/notify',
        '/user/deposit/razorpay/notify',
    ];
}
