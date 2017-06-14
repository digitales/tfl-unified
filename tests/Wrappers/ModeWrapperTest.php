<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class ModeWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_arrivals_for_given_mode()
    {
        $mode = 'tube';
        $count = null;

        $results = $this->tflApi->mode()->arrivals($mode, $count);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Prediction', $results[0]);
    }

    /** @test */
    public function it_gets_service_types_for_mode()
    {
        $results = $this->tflApi->mode()->getActiveServiceTypes();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\ActiveServiceType', $results[0]);
    }
}
