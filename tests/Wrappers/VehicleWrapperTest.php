<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class VehicleWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_predictions_for_vehicle_ids()
    {
        $ids = [
            'LX58CFV',
            'LX11AZB',
            'LX58CFE'
        ];

        $results = $this->tflApi->vehicle()->get($ids);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Prediction', $results[0]);
    }

    /** @test */
    public function it_gets_emissions_surcharge_for_vehicle()
    {
        $vrm = 'T520JAR';

        $results = $this->tflApi->vehicle()->getVehicle($vrm);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\EmissionsSurchargeVehicle', $results);
    }
}
