<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\ApiService;

class SearchWrapperTest extends WrapperTest
{
    /** @test */
    public function it_searches_bus_schedules_for_given_bus()
    {
        $query = 'P5';

        $results = $this->tflApi->search()->busSchedules($query);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\SearchResponse', $results);
    }

    /** @test */
    public function it_searches_site_for_query()
    {
        $query = 'Brixton';

        $results = $this->tflApi->search()->get($query);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\SearchResponse', $results);
    }

    /** @test */
    public function it_gets_search_categories()
    {
        $results = $this->tflApi->search()->metaCategories();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInternalType('string', $results[0]);
    }

    /** @test */
    public function it_gets_search_provider_names()
    {
        $results = $this->tflApi->search()->metaSearchProviders();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInternalType('string', $results[0]);
    }

    /** @test */
    public function it_gets_sorting_options()
    {
        $results = $this->tflApi->search()->metaSorts();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInternalType('string', $results[0]);
    }
}
