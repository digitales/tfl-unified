<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class RoadWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_list_of_disrupted_streets()
    {
        $start_date = "2017-05-23T12:00:00Z";
        $end_date = "2017-05-30T12:00:00Z";

        $results = $this->tflApi->road()->disruptedStreets($start_date, $end_date);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Object', $results);
    }

    /** @test */
    public function it_gets_active_disruptions_by_road_ids()
    {
        $ids = "A2";
        $strip_content = null;
        $severities = null;
        $categories = null;
        $closures = null;

        $results = $this->tflApi->road()->disruption($ids, $strip_content, $severities, $categories, $closures);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\RoadDisruption', $results[0]);
    }

    /** @test */
    public function it_gets_active_disruptions_by_disruption_ids()
    {
        $disruption_ids = 'TIMS-134928';
        $strip_content = null;

        $results = $this->tflApi->road()->disruptionById($disruption_ids, $strip_content);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\RoadDisruption', $results);
    }

    /** @test */
    public function it_gets_all_road_managed_by_tfl()
    {
        $results = $this->tflApi->road()->get();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\RoadCorridor', $results[0]);
    }

    /** @test */
    public function it_gets_roads_by_id()
    {
        $ids = 'A2';

        $results = $this->tflApi->road()->getById($ids);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\RoadCorridor', $results[0]);
    }

    /** @test */
    public function it_gets_road_disruption_categories()
    {
        $results = $this->tflApi->road()->metaCategories();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInternalType('string', $results[0]);
    }

    /** @test */
    public function it_gets_road_disruption_severity_codes()
    {
        $results = $this->tflApi->road()->metaSeverities();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StatusSeverity', $results[0]);
    }

    /** @test */
    public function it_gets_roads_by_status_and_date()
    {
        $ids = 'A2';
        $date_range_nullable_start_date = null;
        $date_range_nullable_end_date = null;

        $results = $this->tflApi->road()->status($ids, $date_range_nullable_start_date, $date_range_nullable_end_date);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\RoadCorridor', $results[0]);
    }
}
