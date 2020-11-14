<?php

namespace Webfoo\PositionFieldtype;

use Webfoo\PositionFieldtype\PositionFieldtype;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $fieldtypes = [
        PositionFieldtype::class
    ];

    protected $scripts = [
        __DIR__ . '/../dist/js/position-fieldtype.js',
    ];

    protected $stylesheets = [
        __DIR__ . '/../dist/css/position-fieldtype.css',
    ];
}
