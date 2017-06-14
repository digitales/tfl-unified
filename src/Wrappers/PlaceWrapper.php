<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\PlaceApi;
use Abulia\TflUnified\Swagger\ApiException;
use Abulia\TflUnified\Exceptions\WrapperException;

/**
 * Class PlaceWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class PlaceWrapper extends Wrapper
{
    /**
     * @var null|PlaceApi
     */
    protected $placeApi = null;

    /**
     * PlaceWrapper constructor.
     * @param ApiService $apiService
     * @param null $placeApi
     */
    public function __construct(ApiService $apiService, $placeApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $placeApi) {
            $placeApi = new PlaceApi($apiService->getApiClient());
        }

        $this->placeApi = $placeApi;
    }

    /**
     * Gets the place with the given id.
     *
     * @param string $id The id of the place, you can use the /Place/Types/{types} endpoint to get a list of places for a given type including their ids (required)
     * @param bool $include_children Defaults to false. If true child places e.g. individual charging stations at a charge point while be included, otherwise just the URLs of any child places will be returned (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Place[]
     */
    public function get($id, $include_children = null)
    {
        try {
            $return = $this->placeApi->placeGet(
                $id,
                $this->boolToStr($include_children)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets any places of the given type whose geography intersects the given latitude and longitude. In practice this means the Place              must be polygonal e.g. a BoroughBoundary.
     *
     * @param string[] $type The place type (a valid list of place types can be obtained from the /Place/Meta/placeTypes endpoint) (required)
     * @param string $lat  (required)
     * @param string $lon  (required)
     * @param double $location_lat  (required)
     * @param double $location_lon  (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Object
     */
    public function getAt($type, $lat, $lon, $location_lat, $location_lon)
    {
        try {
            $return = $this->placeApi->placeGetAt($type, $lat, $lon, $location_lat, $location_lon);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the places that lie within the bounding box defined by the lat/lon of its north-west and south-east corners. Optionally filters              on type and can strip properties for a smaller payload.
     *
     * @param double $sw_lat  (required)
     * @param double $sw_lon  (required)
     * @param double $ne_lat  (required)
     * @param double $ne_lon  (required)
     * @param string[] $categories an optional list of comma separated property categories to return in the Place&#39;s property bag. If null or empty, all categories of property are returned. Pass the keyword \&quot;none\&quot; to return no properties (a valid list of categories can be obtained from the /Place/Meta/categories endpoint) (optional)
     * @param bool $include_children Defaults to false. If true child places e.g. individual charging stations at a charge point while be included, otherwise just the URLs of any child places will be returned (optional)
     * @param string[] $type place types to filter on, or null to return all types (optional)
     * @param bool $active_only An optional parameter to limit the results to active records only (Currently only the &#39;VariableMessageSign&#39; place type is supported) (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StopPoint[]
     */
    public function getByGeoBox($sw_lat, $sw_lon, $ne_lat, $ne_lon, $categories = null, $include_children = null, $type = null, $active_only = null)
    {
        try {
            $return = $this->placeApi->placeGetByGeoBox(
                $sw_lat,
                $sw_lon,
                $ne_lat,
                $ne_lon,
                $categories,
                $this->boolToStr($include_children),
                $type,
                $this->boolToStr($active_only)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets all places of a given type
     *
     * @param string[] $types A comma-separated list of the types to return. Max. approx 12 types.              A valid list of place types can be obtained from the /Place/Meta/placeTypes endpoint. (required)
     * @param bool $active_only An optional parameter to limit the results to active records only (Currently only the &#39;VariableMessageSign&#39; place type is supported) (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Place[]
     */
    public function getByType($types, $active_only = null)
    {
        try {
            $return = $this->placeApi->placeGetByType(
                $types,
                $this->boolToStr($active_only)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the place overlay for a given set of co-ordinates and a given width/height.
     *
     * @param int $z The zoom level (required)
     * @param string[] $type The place type (a valid list of place types can be obtained from the /Place/Meta/placeTypes endpoint) (required)
     * @param int $width The width of the requested overlay. (required)
     * @param int $height The height of the requested overlay. (required)
     * @param string $lat  (required)
     * @param string $lon  (required)
     * @param double $location_lat  (required)
     * @param double $location_lon  (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Object
     */
    public function getOverlay($z, $type, $width, $height, $lat, $lon, $location_lat, $location_lon)
    {
        try {
            $return = $this->placeApi->placeGetOverlay($z, $type, $width, $height, $lat, $lon, $location_lat, $location_lon);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the set of streets associated with a post code.
     *
     * @param string $postcode  (required)
     * @param string $postcode_input_postcode  (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Object
     */
    public function getStreetsByPostCode($postcode, $postcode_input_postcode = null)
    {
        try {
            $return = $this->placeApi->placeGetStreetsByPostCode($postcode, $postcode_input_postcode);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of all of the available place property categories and keys.
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\PlaceCategory[]
     */
    public function metaCategories()
    {
        try {
            $return = $this->placeApi->placeMetaCategories();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of the available types of Place.
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\PlaceCategory[]
     */
    public function metaPlaceTypes()
    {
        try {
            $return = $this->placeApi->placeMetaPlaceTypes();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets all places that matches the given query
     *
     * @param string $name The name of the place, you can use the /Place/Types/{types} endpoint to get a list of places for a given type including their names. (required)
     * @param string[] $types A comma-separated list of the types to return. Max. approx 12 types. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Place[]
     */
    public function search($name, $types = null)
    {
        try {
            $return = $this->placeApi->placeSearch($name, $types);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
