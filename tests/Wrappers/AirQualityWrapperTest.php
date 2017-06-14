<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class AirQualityWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_air_quality_feed()
    {
        $results = $this->tflApi->airQuality()->get();
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Object', $results);
    }
}
