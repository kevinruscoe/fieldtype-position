<?php

namespace KevinRuscoe\FieldtypePosition;

use KevinRuscoe\FieldtypePosition\Fieldtypes\Position;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $fieldtypes = [
        Position::class
    ];

    protected $scripts = [
        __DIR__ . '/../dist/js/position-fieldtype.js',
    ];

    protected $stylesheets = [
        __DIR__ . '/../dist/css/position-fieldtype.css',
    ];
}
