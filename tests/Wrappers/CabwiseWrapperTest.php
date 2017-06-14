<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class CabwiseWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_cab_info_by_lat_long()
    {
        $lat = 51.4295416;
        $lon = -0.1035083;

        $results = $this->tflApi->cabwise()->get($lat, $lon);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Object', $results);
    }
}
