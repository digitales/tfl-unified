<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class AccidentStatsWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_all_accident_details()
    {
        $year = 2015;

        $results = $this->tflApi->accidentStats()->get($year);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\AccidentDetail', $results[0]);
    }
}
