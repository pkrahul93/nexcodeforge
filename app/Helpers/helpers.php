<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

if (! function_exists('isActive')) {
    function isActive($routes, $output = 'active')
    {
        foreach ((array) $routes as $route) {
            if (request()->is($route)) {
                return $output;
            }
        }

        return '';
    }
}
