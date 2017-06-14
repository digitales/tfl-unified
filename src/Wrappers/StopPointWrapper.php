<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\StopPointApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class StopPointWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class StopPointWrapper extends Wrapper
{
    /**
     * @var null|StopPointApi
     */
    protected $stopPointApi = null;

    /**
     * StopPointWrapper constructor.
     * @param ApiService $apiService
     * @param null $stopPointApi
     */
    public function __construct(ApiService $apiService, $stopPointApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $stopPointApi) {
            $stopPointApi = new StopPointApi($apiService->getApiClient());
        }

        $this->stopPointApi = $stopPointApi;
    }

    /**
     * Gets all the Crowding data (static) for the StopPointId, plus crowding data for a given line and optionally
     * a particular direction.
     *
     * @param string $id The Naptan id of the stop (required)
     * @param string $line A particular line e.g. victoria, circle, northern etc. (required)
     * @param string $direction The direction of travel. Can be inbound or outbound. (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StopPoint[]
     */
    public function crowding($id, $line, $direction)
    {
        try {
            $return = $this->stopPointApi->stopPointCrowding($id, $line, $direction);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the list of arrival predictions for the given stop point id
     *
     * @param string $id A StopPoint id (station naptan code e.g. 940GZZLUASL, you can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name) (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Prediction[]
     */
    public function arrivals($id)
    {
        try {
            $return = $this->stopPointApi->stopPointArrivals($id);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Returns the canonical direction, \"inbound\" or \"outbound\", for a given pair of
     * stop point Ids in the direction from -&gt; to.
     *
     * @param string $id Originating stop id (station naptan code e.g. 940GZZLUASL, you can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name) (required)
     * @param string $to_stop_point_id Destination stop id (station naptan code e.g. 940GZZLUASL, you can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name) (required)
     * @param string $line_id Optional line id filter e.g. victoria (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return string
     */
    public function direction($id, $to_stop_point_id, $line_id = null)
    {
        try {
            $return = $this->stopPointApi->stopPointDirection($id, $to_stop_point_id, $line_id);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets all disruptions for the specified StopPointId, plus disruptions for any child Naptan records it may have.
     *
     * @param string[] $ids A comma-seperated list of stop point ids. Max. approx. 20 ids.              You can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name. (required)
     * @param bool $get_family Specify true to return disruptions for entire family, or false to return disruptions for just this stop point. Defaults to false. (optional)
     * @param bool $include_route_blocked_stops  (optional)
     * @param bool $flatten_response Specify true to associate all disruptions with parent stop point. (Only applicable when getFamily is true). (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\DisruptedPoint[]
     */
    public function disruption($ids, $get_family = null, $include_route_blocked_stops = null, $flatten_response = null)
    {
        try {
            $return = $this->stopPointApi->stopPointDisruption(
                $ids,
                $this->boolToStr($get_family),
                $this->boolToStr($include_route_blocked_stops),
                $this->boolToStr($flatten_response)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a distinct list of disrupted stop points for the given modes
     *
     * @param string[] $modes A comma-seperated list of modes e.g. tube,dlr (required)
     * @param bool $include_route_blocked_stops  (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\DisruptedPoint[]
     */
    public function disruptionByMode($modes, $include_route_blocked_stops = null)
    {
        try {
            $return = $this->stopPointApi->stopPointDisruptionByMode(
                $modes,
                $this->boolToStr($include_route_blocked_stops)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of StopPoints corresponding to the given list of stop ids.
     *
     * @param string[] $ids A comma-separated list of stop point ids (station naptan code e.g. 940GZZLUASL). Max. approx. 20 ids.              You can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name. (required)
     * @param bool $include_crowding_data Include the crowding data (static). To Filter further use: /StopPoint/{ids}/Crowding/{line} (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StopPoint[]
     */
    public function get($ids, $include_crowding_data = null)
    {
        try {
            $return = $this->stopPointApi->stopPointGet(
                $ids,
                $this->boolToStr($include_crowding_data)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of StopPoints within {radius} by the specified criteria
     *
     * @param string[] $stop_types a list of stopTypes that should be returned (a list of valid stop types can be obtained from the StopPoint/meta/stoptypes endpoint) (required)
     * @param double $lat  (required)
     * @param double $lon  (required)
     * @param int $radius the radius of the bounding circle in metres (default : 200) (optional)
     * @param bool $use_stop_point_hierarchy Re-arrange the output into a parent/child hierarchy (optional)
     * @param string[] $modes the list of modes to search (comma separated mode names e.g. tube,dlr) (optional)
     * @param string[] $categories an optional list of comma separated property categories to return in the StopPoint&#39;s property bag. If null or empty, all categories of property are returned. Pass the keyword \&quot;none\&quot; to return no properties (a valid list of categories can be obtained from the /StopPoint/Meta/categories endpoint) (optional)
     * @param bool $return_lines true to return the lines that each stop point serves as a nested resource (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StopPointsResponse
     */
    public function getByGeoPoint($stop_types, $lat, $lon, $radius = null, $use_stop_point_hierarchy = null, $modes = null, $categories = null, $return_lines = null)
    {
        try {
            $return = $this->stopPointApi->stopPointGetByGeoPoint(
                $stop_types,
                $lat,
                $lon,
                $radius,
                $this->boolToStr($use_stop_point_hierarchy),
                $modes,
                $categories,
                $this->boolToStr($return_lines)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of StopPoints filtered by the modes available at that StopPoint.
     *
     * @param string[] $modes A comma-seperated list of modes e.g. tube,dlr (required)
     * @param int $page The data set page to return. Page 1 equates to the first 1000 stop points, page 2 equates to 1001-2000 etc. Must be entered for bus mode as data set is too large. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StopPointsResponse
     */
    public function getByMode($modes, $page = null)
    {
        try {
            $return = $this->stopPointApi->stopPointGetByMode($modes, $page);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a StopPoint for a given sms code.
     *
     * NOTE: On success, Tfl api responds with 302 redirect.
     *
     * @param string $id A 5-digit Countdown Bus Stop Code e.g. 73241, 50435, 56334. (required)
     * @param string $output If set to \&quot;web\&quot;, a 302 redirect to relevant website bus stop page is returned. Valid values are : web. All other values are ignored. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return string
     */
    public function getBySms($id, $output = null)
    {
        try {
            $return = $this->stopPointApi->stopPointGetBySms($id, $output);
        } catch(ApiException $e) {
            if ($e->getCode() == 302 && isset($e->getResponseHeaders()['Location'])) {
                if (preg_match('/^\/StopPoint\/([0-9A-Z]+)$/', $e->getResponseHeaders()['Location'], $matches)) {
                    return $matches[1];
                }
            }

            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets all stop points of a given type
     *
     * @param string[] $types A comma-separated list of the types to return. Max. approx. 12 types.               A list of valid stop types can be obtained from the StopPoint/meta/stoptypes endpoint. (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StopPoint[]
     */
    public function getByType($types)
    {
        try {
            $return = $this->stopPointApi->stopPointGetByType($types);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Get car parks corresponding to the given stop point id.
     *
     * @param string $stop_point_id stopPointId is required to get the car parks. (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Place[]
     */
    public function getCarParksById($stop_point_id)
    {
        try {
            $return = $this->stopPointApi->stopPointGetCarParksById($stop_point_id);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the service types for a given stoppoint
     *
     * @param string $id The Naptan id of the stop (required)
     * @param string[] $line_ids The lines which contain the given Naptan id (all lines relevant to the given stoppoint if empty) (optional)
     * @param string[] $modes The modes which the lines are relevant to (all if empty) (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\LineServiceType[]
     */
    public function getServiceTypes($id, $line_ids = null, $modes = null)
    {
        try {
            $return = $this->stopPointApi->stopPointGetServiceTypes($id, $line_ids, $modes);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of taxi ranks corresponding to the given stop point id.
     *
     * @param string $stop_point_id stopPointId is required to get the taxi ranks. (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Place[]
     */
    public function getTaxiRanksByIds($stop_point_id)
    {
        try {
            $return = $this->stopPointApi->stopPointGetTaxiRanksByIds($stop_point_id);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the list of available StopPoint additional information categories
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StopPointCategory[]
     */
    public function metaCategories()
    {
        try {
            $return = $this->stopPointApi->stopPointMetaCategories();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the list of available StopPoint modes
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Mode[]
     */
    public function metaModes()
    {
        try {
            $return = $this->stopPointApi->stopPointMetaModes();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the list of available StopPoint types
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return string[]
     */
    public function metaStopTypes()
    {
        try {
            $return = $this->stopPointApi->stopPointMetaStopTypes();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets Stopoints that are reachable from a station/line combination.
     *
     * @param string $id The id (station naptan code e.g. 940GZZLUASL, you can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name) of the stop point to filter by (required)
     * @param string $line_id Line id of the line to filter by (e.g. victoria) (required)
     * @param string[] $service_types A comma-separated list of service types to filter on. If not specified. Supported values: Regular, Night. Defaulted to &#39;Regular&#39; if not specified (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StopPoint[]
     */
    public function reachableFrom($id, $line_id, $service_types = null)
    {
        try {
            $return = $this->stopPointApi->stopPointReachableFrom($id, $line_id, $service_types);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Returns the route sections for all the lines that service the given stop point ids
     *
     * @param string $id A stop point id (station naptan codes e.g. 940GZZLUASL, you can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name) (required)
     * @param string[] $service_types A comma-separated list of service types to filter on. If not specified. Supported values: Regular, Night. Defaulted to &#39;Regular&#39; if not specified (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StopPointRouteSection[]
     */
    public function route($id, $service_types = null)
    {
        try {
            $return = $this->stopPointApi->stopPointRoute($id, $service_types);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Search StopPoints by their common name, or their 5-digit Countdown Bus Stop Code.
     *
     * @param string $query The query string, case-insensitive. Leading and trailing wildcards are applied automatically. (required)
     * @param string[] $modes An optional, parameter separated list of the modes to filter by (optional)
     * @param bool $fares_only True to only return stations in that have Fares data available for single fares to another station. (optional)
     * @param int $max_results An optional result limit, defaulting to and with a maximum of 50. Since children of the stop point heirarchy are returned for matches,              it is possible that the flattened result set will contain more than 50 items. (optional)
     * @param string[] $lines An optional, parameter separated list of the lines to filter by (optional)
     * @param bool $include_hubs If true, returns results including HUBs. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\SearchResponse
     */
    public function search($query, $modes = null, $fares_only = null, $max_results = null, $lines = null, $include_hubs = null)
    {
        try {
            $return = $this->stopPointApi->stopPointSearch(
                $query,
                $modes,
                $this->boolToStr($fares_only),
                $max_results,
                $lines,
                $this->boolToStr($include_hubs)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Search StopPoints by their common name, or their 5-digit Countdown Bus Stop Code.
     *
     * @param string $query The query string, case-insensitive. Leading and trailing wildcards are applied automatically. (required)
     * @param string[] $modes An optional, parameter separated list of the modes to filter by (optional)
     * @param bool $fares_only True to only return stations in that have Fares data available for single fares to another station. (optional)
     * @param int $max_results An optional result limit, defaulting to and with a maximum of 50. Since children of the stop point heirarchy are returned for matches,              it is possible that the flattened result set will contain more than 50 items. (optional)
     * @param string[] $lines An optional, parameter separated list of the lines to filter by (optional)
     * @param bool $include_hubs If true, returns results including HUBs. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\SearchResponse
     */
    public function searchByQuery($query, $modes = null, $fares_only = null, $max_results = null, $lines = null, $include_hubs = null)
    {
        try {
            $return = $this->stopPointApi->stopPointSearchByQuery(
                $query,
                $modes,
                $this->boolToStr($fares_only),
                $max_results,
                $lines,
                $this->boolToStr($include_hubs)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
