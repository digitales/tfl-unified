<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;
use Illuminate\Container\Container;
use Tests\TestCase;

abstract class WrapperTest extends TestCase
//abstract class WrapperTest extends PHPUnit_Framework_TestCase
{
    protected $tflApi;

    public function setUp()
    {
        parent::setUp();
        $this->tflApi = new ApiService(config('tfl'), Container::getInstance());
        $this->tflApi->setLogger(app('log'));
    }
}
