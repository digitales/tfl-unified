<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class OccupancyWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_occupancy_for_all_car_parks()
    {
        $results = $this->tflApi->occupancy()->get();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\CarParkOccupancy', $results[0]);
    }

    /** @test */
    public function it_gets_occupancy_for_all_car_park_by_id()
    {
        $id = 'CarParks_800491';

        $results = $this->tflApi->occupancy()->getById($id);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\CarParkOccupancy', $results);
    }
}
