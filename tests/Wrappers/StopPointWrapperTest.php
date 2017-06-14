<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class StopPointWrapperTest extends WrapperTest
{
    protected function getMetaModes()
    {
        return [
            "bus",
            "cable-car",
            "coach",
            "cycle",
            "cycle-hire",
            "dlr",
            "interchange-keep-sitting",
            "interchange-secure",
            "national-rail",
            "overground",
            "replacement-bus",
            "river-bus",
            "river-tour",
            "tflrail",
            "tram",
            "tube",
            "walking"
        ];
    }

    /** @test */
    public function it_gets_crowding_date_for_stop_point()
    {
        $id = '490G00000351';   // Marylebone Station
        $line = 2;
        $direction = "inbound";

        $results = $this->tflApi->stopPoint()->crowding($id, $line, $direction);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPoint', $results[0]);
    }

    /** @test */
    public function it_gets_list_of_arrivals_by_stop_point()
    {
        $id = '940GZZLUASL';

        $results = $this->tflApi->stopPoint()->arrivals($id);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Prediction', $results[0]);
    }

    /** @test */
    public function it_gets_canonical_direction_for_given_stop_points()
    {
        $id = '490000031T';                 // Brixton station stop T
        $to_stop_point_id = '490000144W';   // Marble Arch stop W
        $line_id = 2;

        $results = $this->tflApi->stopPoint()->direction($id, $to_stop_point_id, $line_id);
        $this->assertNotEmpty($results);
        $this->assertInternalType('string', $results);
    }

    /** @test */
    public function it_gets_disruptions_for_stop_point()
    {
        $ids = '940GZZLUASL';
        $get_family = null;
        $include_route_blocked_stops = null;
        $flatten_response = null;

        $results = $this->tflApi->stopPoint()->disruption($ids, $get_family, $include_route_blocked_stops, $flatten_response);
        $this->assertInternalType('array', $results);
        if ( ! empty($results)) {
            $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\DisruptedPoint', $results[0]);
        }
    }

    /** @test */
    public function it_gets_disrupted_stop_points_for_mode()
    {
        $modes = "bus";
        $include_route_blocked_stops = null;

        $results = $this->tflApi->stopPoint()->disruptionByMode($modes, $include_route_blocked_stops);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\DisruptedPoint', $results[0]);
    }

    /** @test */
    public function it_gets_stop_points_by_stop_ids()
    {
        $ids = '490000144W';
        $include_crowding_data = null;

        $results = $this->tflApi->stopPoint()->get($ids, $include_crowding_data);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPoint', $results[0]);
    }

    /** @test */
    public function it_gets_stop_points_by_geo_point()
    {
        $stop_types = 'NaptanPublicBusCoachTram';
        $lat = 51.466827;
        $lon = -0.117325;
        $radius = null;
        $use_stop_point_hierarchy = null;
        $modes = null;
        $categories = null;
        $return_lines = null;

        $results = $this->tflApi->stopPoint()->getByGeoPoint($stop_types, $lat, $lon, $radius, $use_stop_point_hierarchy, $modes, $categories, $return_lines);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPointsResponse', $results);
    }

    /** @test */
    public function it_gets_stop_points_by_single_mode_bus()
    {
        $modes = "bus";
        $page = 1;

        $results = $this->tflApi->stopPoint()->getByMode($modes, $page);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPointsResponse', $results);
    }

    /** @test */
    public function it_gets_stop_points_by_single_mode_tube()
    {
        $modes = "tube";
        $page = null;

        $results = $this->tflApi->stopPoint()->getByMode($modes, $page);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPointsResponse', $results);
    }

    /** @test */
    public function it_gets_stop_points_by_all_modes()
    {
        $modes = $this->getMetaModes();
        $page = 1;

        $results = $this->tflApi->stopPoint()->getByMode($modes, $page);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPointsResponse', $results);
    }

    /** @test */
    public function it_gets_stop_point_by_sms_code()
    {
        $id = '73875';      // Brixton Stop T
        $output = null;

        $results = $this->tflApi->stopPoint()->getBySms($id, $output);
        $this->assertEquals('490000031T', $results);
    }

    /** @test */
    public function it_gets_stop_points_by_type()
    {
        $types = 'NaptanMetroStation';

        $results = $this->tflApi->stopPoint()->getByType($types);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPoint', $results[0]);
    }

    /** @test */
    public function it_gets_car_parks_corresponding_to_stop_point()
    {
        $stop_point_id = '490000144W';

        $results = $this->tflApi->stopPoint()->getCarParksById($stop_point_id);
        $this->assertInternalType('array', $results);
        if ( ! empty($results)) {
            $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Place', $results[0]);
        }
    }

    /** @test */
    public function it_gets_service_types_by_stop_point()
    {
        $id = '490000144W';
        $line_ids = null;
        $modes = null;

        $results = $this->tflApi->stopPoint()->getServiceTypes($id, $line_ids, $modes);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\LineServiceType', $results[0]);
    }

    /** @test */
    public function it_gets_taxi_ranks_by_stop_point()
    {
        $stop_point_id = '490000144W';

        $results = $this->tflApi->stopPoint()->getTaxiRanksByIds($stop_point_id);
        $this->assertInternalType('array', $results);
        if ( ! empty($results)) {
            $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Place', $results[0]);
        }
    }

    /** @test */
    public function it_gets_available_stop_point_categories()
    {
        $results = $this->tflApi->stopPoint()->metaCategories();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPointCategory', $results[0]);
    }

    /** @test */
    public function it_gets_available_stop_point_modes()
    {
        $results = $this->tflApi->stopPoint()->metaModes();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Mode', $results[0]);
    }

    /** @test */
    public function it_gets_available_stop_point_types()
    {
        $results = $this->tflApi->stopPoint()->metaStopTypes();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInternalType('string', $results[0]);
    }

    /** @test */
    public function it_gets_stop_points_reachable_from_station()
    {
        $id = '490000144W';
        $line_id = 2;
        $service_types = null;

        $results = $this->tflApi->stopPoint()->reachableFrom($id, $line_id, $service_types);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPoint', $results[0]);
    }

    /** @test */
    public function it_gets_route_sections_for_lines_servicing_stop_points()
    {
        $id = '490000144W';
        $service_types = null;

        $results = $this->tflApi->stopPoint()->route($id, $service_types);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPointRouteSection', $results[0]);
    }

    /** @test */
    public function it_searches_for_stop_points_by_common_name_or_bus_stop_code()
    {
        $query = 'Brixton';
        $modes = null;
        $fares_only = null;
        $max_results = null;
        $lines = null;
        $include_hubs = null;

        $results = $this->tflApi->stopPoint()->search($query, $modes, $fares_only, $max_results, $lines, $include_hubs);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\SearchResponse', $results);
    }

    /** @test */
    public function it_also_searches_for_stop_points_by_common_name_or_bus_stop_code()
    {
        $query = 'Stockwell';
        $modes = null;
        $fares_only = null;
        $max_results = null;
        $lines = null;
        $include_hubs = null;

        $results = $this->tflApi->stopPoint()->searchByQuery($query, $modes, $fares_only, $max_results, $lines, $include_hubs);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\SearchResponse', $results);
    }
}
