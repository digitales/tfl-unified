<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class TravelTimeWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_travel_time_overlay()
    {
        $z = 8;
        $pin_lat = 51.466827;
        $pin_lon = -0.117325;
        $map_center_lat = 51.463272;
        $map_center_lon = -0.112658;
        $scenario_title = 'Test 123';
        $time_of_day_id = "AM";
        $mode_id = "bus";
        $width = 1000;
        $height = 1000;
        $direction = "Average";
        $travel_time_interval = 100;

        $results = $this->tflApi->travelTime()->getOverlay($z, $pin_lat, $pin_lon, $map_center_lat, $map_center_lon, $scenario_title, $time_of_day_id, $mode_id, $width, $height, $direction, $travel_time_interval);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Object', $results);
    }

    /** @test */
    public function it_gets_travel_time_compare_overlay()
    {
        $z = 8;
        $pin_lat = 51.466827;
        $pin_lon = -0.117325;
        $map_center_lat = 51.463272;
        $map_center_lon = -0.112658;
        $scenario_title = 'Test 123';
        $time_of_day_id = "AM";
        $mode_id = "bus";
        $width = 1000;
        $height = 1000;
        $direction = "Average";
        $travel_time_interval = 100;
        $compare_type = "A";
        $compare_value = "B";

        $results = $this->tflApi->travelTime()->getCompareOverlay($z, $pin_lat, $pin_lon, $map_center_lat, $map_center_lon, $scenario_title, $time_of_day_id, $mode_id, $width, $height, $direction, $travel_time_interval, $compare_type, $compare_value);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Object', $results);
    }
}
