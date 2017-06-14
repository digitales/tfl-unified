<?php

namespace Abulia\TflUnified\Tests\Wrappers;

use Abulia\TflUnified\Exceptions\KeyNotFoundException;

class PlaceWrapperTest extends WrapperTest
{
    /** @test */
    public function it_gets_place_by_id()
    {
        $id = 'TaxiRank_3207';
        $include_children = true;

        $results = $this->tflApi->place()->get($id, $include_children);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Place', $results[0]);
    }

    /** @test */
    public function it_gets_any_place_which_intersects_lat_and_long()
    {
        $type = 'Boroughs';
        $lat = 51.463970;
        $lon = -0.221613;
        $location_lat = 51.425349;
        $location_lon = -0.102341;

        $results = $this->tflApi->place()->getAt($type, $lat, $lon, $location_lat, $location_lon);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Object', $results);
    }

    /** @test */
    public function it_gets_places_within_bounding_box()
    {
        $sw_lat  = 51.425349;
        $sw_lon = -0.221613;
        $ne_lat = 51.463970;
        $ne_lon = -0.102341;
        $categories = null;
        $include_children = null;
        $type = null;
        $active_only = null;

        $results = $this->tflApi->place()->getByGeoBox($sw_lat, $sw_lon, $ne_lat, $ne_lon, $categories, $include_children, $type, $active_only);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\StopPoint', $results[0]);
    }

    /** @test */
    public function it_gets_all_places_of_given_type()
    {
        $types = 'TaxiRank';
        $active_only = null;

        $results = $this->tflApi->place()->getByType($types, $active_only);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Place', $results[0]);
    }

    /** @test */
    public function it_gets_place_overlay_for_coords()
    {
        $z = 10;
        $type = 'Boroughs';
        $width = 1000;
        $height = 1000;
        $lat = 51.463970;
        $lon = -0.221613;
        $location_lat = 51.425349;
        $location_lon = -0.102341;

        $results = $this->tflApi->place()->getOverlay($z, $type, $width, $height, $lat, $lon, $location_lat, $location_lon);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\SplFileInfo', $results);
    }

    /** @test */
    public function it_gets_place_overlay_for_coords_with_invalid_type()
    {
        $this->expectException(KeyNotFoundException::class);

        $z = 10;
        $type = 'TaxiRank';
        $width = 1000;
        $height = 1000;
        $lat = 51.463970;
        $lon = -0.221613;
        $location_lat = 51.425349;
        $location_lon = -0.102341;

        $results = $this->tflApi->place()->getOverlay($z, $type, $width, $height, $lat, $lon, $location_lat, $location_lon);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Object', $results);
    }

    /** @test */
    public function it_gets_streets_by_postcode()
    {
        $postcode = 'sw9 9hr';
        $postcode_input_postcode = 'sw9 9hr';

        $results = $this->tflApi->place()->getStreetsByPostCode($postcode, $postcode_input_postcode);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Object', $results);
    }

    /** @test */
    public function it_gets_all_place_property_categories_and_keys()
    {
        $results = $this->tflApi->place()->metaCategories();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\PlaceCategory', $results[0]);
    }

    /** @test */
    public function it_gets_list_of_types_of_place()
    {
        $results = $this->tflApi->place()->metaPlaceTypes();
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\PlaceCategory', $results[0]);
    }

    /** @test */
    public function it_gets_places_matching_query()
    {
        $name = 'Norwood';
        $types = null;

        $results = $this->tflApi->place()->search($name, $types);
        $this->assertInternalType('array', $results);
        $this->assertNotEmpty($results);
        $this->assertInstanceOf('\Abulia\TflUnified\Swagger\Model\Place', $results[0]);
    }
}
