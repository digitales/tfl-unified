<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class LineWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_arrival_predictions_for_given_line_ids()
    {
        $stop_point_id = '490000031T';  // Brixton Station stop
        $ids = 2;

        $results = $this->tflApi->line()->arrivals($stop_point_id, $ids);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Prediction', $results[0]);
    }

    /** @test */
    public function it_gets_arrival_predictions_for_given_line_ids_based_at_given_stop_and_direction()
    {
        $stop_point_id = '490000031T';  // Brixton Station stop
        $ids = 2;
        $direction = "inbound";

        $results = $this->tflApi->line()->arrivalsByStopPoint($stop_point_id, $ids, $direction);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Prediction', $results[0]);
    }

    /** @test */
    public function it_gets_disruptions_for_single_line_ids()
    {
        $ids = 2;

        $results = $this->tflApi->line()->disruption($ids);
        $this->assertInternalType('array', $results);
        if ( ! empty($results)) {
            $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Disruption', $results[0]);
        }
    }

    /** @test */
    public function it_gets_disruptions_for_multiple_line_ids()
    {
        $ids = [2,3,4,5,6,7,8,9];

        $results = $this->tflApi->line()->disruption($ids);
        $this->assertInternalType('array', $results);
        if ( ! empty($results)) {
            $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Disruption', $results[0]);
        }
    }

    /** @test */
    public function it_gets_disruptions_for_all_lines_of_given_modes()
    {
        $modes = "tube";

        $results = $this->tflApi->line()->disruptionByMode($modes);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Disruption', $results[0]);
    }

    /** @test */
    public function it_gets_lines_by_id()
    {
        $ids = 2;

        $results = $this->tflApi->line()->get($ids);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Line', $results[0]);
    }

    /** @test */
    public function it_gets_line_by_modes()
    {
        $modes = "bus";

        $results = $this->tflApi->line()->getByMode($modes);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Line', $results[0]);
    }

    /** @test */
    public function it_gets_valid_routes_for_given_lines()
    {
        $ids = 2;
        $service_types = "Regular";

        $results = $this->tflApi->line()->lineRoutesByIds($ids, $service_types);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Line', $results[0]);
    }

    /** @test */
    public function it_gets_list_of_categories_to_filter_disruptions()
    {
        $results = $this->tflApi->line()->metaDisruptionCategories();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInternalType('string', $results[0]);
    }

    /** @test */
    public function it_gets_list_of_all_valid_modes_to_filter_by()
    {
        $results = $this->tflApi->line()->metaModes();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Mode', $results[0]);
    }

    /** @test */
    public function it_gets_list_of_valid_service_types_to_filter_on()
    {
        $results = $this->tflApi->line()->metaServiceTypes();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInternalType('string', $results[0]);
    }

    /** @test */
    public function it_gets_list_of_severity_codes()
    {
        $results = $this->tflApi->line()->metaSeverity();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StatusSeverity', $results[0]);
    }

    /** @test */
    public function it_gets_all_lines_for_given_modes()
    {
        $modes = "bus";
        $service_types = "Regular";

        $results = $this->tflApi->line()->routeByMode($modes, $service_types);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Line', $results[0]);
    }

    /** @test */
    public function it_gets_all_valid_routes_for_given_line()
    {
        $id = 2;
        $direction = "inbound";
        $service_types = "Regular";
        $exclude_crowding = false;

        $results = $this->tflApi->line()->routeSequence($id, $direction, $service_types, $exclude_crowding);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\RouteSequence', $results);
    }

    /** @test */
    public function it_searches_for_lines_matching_query()
    {
        $query = "Victoria";
        $modes = "tube";
        $service_types = "Regular";

        $results = $this->tflApi->line()->search($query, $modes, $service_types);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\RouteSearchResponse', $results);
    }

    /** @test */
    public function it_gets_line_status_for_given_line_ids_by_date()
    {
        $ids = 2;
        $start_date = "2017-05-23T12:00:00Z";
        $end_date = "2017-05-30T12:00:00Z";
        $detail = true;
        $date_range_start_date = null;
        $date_range_end_date = null;

        $results = $this->tflApi->line()->status($ids, $start_date, $end_date, $detail, $date_range_start_date, $date_range_end_date);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Line', $results[0]);
    }

    /** @test */
    public function it_gets_line_status_for_given_line_ids()
    {
        $ids = 2;
        $detail = true;

        $results = $this->tflApi->line()->statusByIds($ids, $detail);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Line', $results[0]);
    }

    /** @test */
    public function it_gets_line_status_for_all_lines_for_given_modes()
    {
        $modes = "tube";
        $detail = true;

        $results = $this->tflApi->line()->statusByMode($modes, $detail);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Line', $results[0]);
    }

    /** @test */
    public function it_gets_line_status_for_all_lines_with_given_severity()
    {
        $severity = 10;

        $results = $this->tflApi->line()->statusBySeverity($severity);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Line', $results[0]);
    }

    /** @test */
    public function it_gets_stations_that_serve_given_line_by_id()
    {
        $id = 2;

        $results = $this->tflApi->line()->stopPoints($id);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPoint', $results[0]);
    }

    /** @test */
    public function it_gets_timetable_for_specified_station_on_given_line()
    {
        $from_stop_point_id = '490000031T';  // Brixton Station stop
        $id = 2;

        $results = $this->tflApi->line()->timetable($from_stop_point_id, $id);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\TimetableResponse', $results);
    }

    /** @test */
    public function it_gets_timetable_for_specified_station_on_given_line_with_destination()
    {
        $from_stop_point_id = '490010444W';    // Norwood bus garage
        $id = 2;
        $to_stop_point_id = '490000031T';  // Brixton Station stop

        $results = $this->tflApi->line()->timetableTo($from_stop_point_id, $id, $to_stop_point_id);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\TimetableResponse', $results);
    }
}
