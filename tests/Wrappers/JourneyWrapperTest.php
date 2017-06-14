<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class JourneyWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_a_list_of_modes()
    {
        $results = $this->tflApi->journey()->meta();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Mode', $results[0]);
    }

    /** @test */
    public function it_gets_journey_results_between_unambiguous_locations()
    {
        $from = 'SW9 9HR';
        $to = 'EC2A 3QT';
        $results = $this->tflApi->journey()->journeyResults($from, $to);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\ItineraryResult', $results);
    }

    /** @test */
    public function it_gets_journey_results_between_ambiguous_locations()
    {
        $from = 'Oxford Street';
        $to = 'Hanger Lane';
        $results = $this->tflApi->journey()->withDisambiguation()->journeyResults($from, $to);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\DisambiguationResult', $results);
    }
}
