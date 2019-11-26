<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        
        'VehicleFeatures/edit',
        'VehicleMakes/edit',
        'VehicleBodytype/edit',
        'VehicleFueltype/edit',
        'VehicleTransmission/edit',
        'VehicleModel/edit',
        'VehicleVariant/edit',
        'VehicleDerivative/edit',
    ];
}
