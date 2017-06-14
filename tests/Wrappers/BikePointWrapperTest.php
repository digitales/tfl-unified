<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class BikePointWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_a_bike_point_by_id()
    {
        $id = 'BikePoints_1';
        $results = $this->tflApi->bikePoint()->get($id);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Place', $results);

        $this->assertEquals($id, $results->getId());
    }

    /** @test */
    public function it_gets_a_cached_bike_point_by_id()
    {
        $id = 'BikePoints_1';
        $results = $this->tflApi->cached(5)->bikePoint()->get($id);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Place', $results);

        $this->assertEquals($id, $results->id);
    }

    /** @test */
    public function it_gets_all_bike_points()
    {
        $results = $this->tflApi->bikePoint()->getAll();
        $this->assertNotEmpty($results);
        $this->assertInternalType('array', $results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Place', $results[0]);
    }

    /** @test */
    public function it_gets_bike_points_by_search_query()
    {
        $query = 'St. James';
        $results = $this->tflApi->bikePoint()->search($query);
        $this->assertNotEmpty($results);
        $this->assertInternalType('array', $results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Place', $results[0]);
    }
}
