<?php

namespace Abulia\TflUnified;

use Illuminate\Support\Facades\Facade;

class ApiServiceFacade extends Facade
{
    protected static function getFacadeAccessor() { return ApiService::class; }
}