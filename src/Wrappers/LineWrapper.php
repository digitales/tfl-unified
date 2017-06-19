<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\Api\LineApi;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class LineWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class LineWrapper extends Wrapper
{
    const ERROR_INVALID_ROUTE = 1;

    /**
     * @var null|LineApi
     */
    protected $lineApi = null;

    /**
     * LineWrapper constructor.
     * @param ApiService $apiService
     * @param null $lineApi
     */
    public function __construct(ApiService $apiService, $lineApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $lineApi) {
            $lineApi = new LineApi($apiService->getApiClient());
        }

        $this->lineApi = $lineApi;
    }

    /**
     * Get the list of arrival predictions for given line ids based at the given stop
     *
     * @param string $stop_point_id Id of stop to get arrival predictions for (station naptan code e.g. 940GZZLUASL,
     *        you can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name) (required)
     * @param string[] $ids A comma-separated list of line ids e.g. victoria,circle,N133. Max. approx. 20 ids. (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Prediction[]
     */
    public function arrivals($stop_point_id, $ids)
    {
        try {
            $return = $this->lineApi->lineArrivals($stop_point_id, $ids);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Get the list of arrival predictions for given line ids based at the given stop going in the provided direction
     *
     * @param string $stop_point_id Id of stop to get arrival predictions for (station naptan code e.g. 940GZZLUASL,
     *        you can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name) (required)
     * @param string[] $ids A comma-separated list of line ids e.g. victoria,circle,N133. Max. approx. 20 ids. (required)
     * @param string $direction The direction of travel. Can be inbound or outbound (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Prediction[]
     */
    public function arrivalsByStopPoint($stop_point_id, $ids, $direction)
    {
        try {
            $return = $this->lineApi->lineArrivalsByStopPoint($stop_point_id, $ids, $direction);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Get disruptions for the given line ids
     *
     * @param string[] $ids A comma-separated list of line ids e.g. victoria,circle,N133. Max. approx. 20 ids. (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Disruption[]
     */
    public function disruption($ids)
    {
        try {
            $return = $this->lineApi->lineDisruption($ids);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Get disruptions for all lines of the given modes.
     *
     * @param string[] $modes A comma-separated list of modes e.g. tube,dlr (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Disruption[]
     */
    public function disruptionByMode($modes)
    {
        try {
            $return = $this->lineApi->lineDisruptionByMode($modes);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets line specified by the line id.
     *
     * @param string[] $ids A comma-separated list of line ids e.g. victoria,circle,N133. Max. approx. 20 ids. (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Line[]
     */
    public function get($ids)
    {
        try {
            $return = $this->lineApi->lineGet($ids);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets line specified by provided modes.
     *
     * @param string[] $modes A comma-separated list of modes e.g. tube,dlr (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Line[]
     */
    public function getByMode($modes)
    {
        try {
            $return = $this->lineApi->lineGetByMode($modes);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Get all valid routes for given line ids, including the name and id of the originating and terminating stops for each route.
     *
     * @param string[] $ids A comma-separated list of line ids e.g. victoria,circle,N133. Max. approx. 20 ids. (required)
     * @param string[] $service_types A comma seperated list of service types to filter on. If not specified. Supported values: Regular, Night. Defaulted to &#39;Regular&#39; if not specified (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Line[]
     */
    public function lineRoutesByIds($ids, $service_types = null)
    {
        try {
            $return = $this->lineApi->lineLineRoutesByIds($ids, $service_types);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of valid categories to filter disruptions
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return string[]
     */
    public function metaDisruptionCategories()
    {
        try {
            $return = $this->lineApi->lineMetaDisruptionCategories();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of all of the valid modes to filter lines by
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Mode[]
     */
    public function metaModes()
    {
        try {
            $return = $this->lineApi->lineMetaModes();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of valid ServiceTypes to filter on
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return string[]
     */
    public function metaServiceTypes()
    {
        try {
            $return = $this->lineApi->lineMetaServiceTypes();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of valid severity codes
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StatusSeverity[]
     */
    public function metaSeverity()
    {
        try {
            $return = $this->lineApi->lineMetaSeverity();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets all lines and their valid routes for given modes, including the name and id of the originating and terminating stops for each route
     *
     * @param string[] $modes A comma-separated list of modes e.g. tube,dlr (required)
     * @param string[] $service_types A comma seperated list of service types to filter on. If not specified. Supported values: Regular, Night. Defaulted to &#39;Regular&#39; if not specified (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Line[]
     */
    public function routeByMode($modes, $service_types = null)
    {
        try {
            $return = $this->lineApi->lineRouteByMode($modes, $service_types);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets all valid routes for given line id, including the sequence of stops on each route.
     *
     * @param string $id A single line id e.g. victoria (required)
     * @param string $direction The direction of travel. Can be inbound or outbound. (required)
     * @param string[] $service_types A comma seperated list of service types to filter on. If not specified. Supported values: Regular, Night. Defaulted to &#39;Regular&#39; if not specified (optional)
     * @param bool $exclude_crowding That excludes crowding from line disruptions. Can be true or false. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\RouteSequence
     */
    public function routeSequence($id, $direction, $service_types = null, $exclude_crowding = null)
    {
        try {
            $return = $this->lineApi->lineRouteSequence(
                $id,
                $direction,
                $service_types,
                $this->boolToStr($exclude_crowding)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Search for lines or routes matching the query string
     *
     * @param string $query Search term e.g victoria (required)
     * @param string[] $modes Optionally filter by the specified modes (optional)
     * @param string[] $service_types A comma seperated list of service types to filter on. If not specified. Supported values: Regular, Night. Defaulted to &#39;Regular&#39; if not specified (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\RouteSearchResponse
     */
    public function search($query, $modes = null, $service_types = null)
    {
        try {
            $return = $this->lineApi->lineSearch($query, $modes, $service_types);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the line status for given line ids during the provided dates e.g Minor Delays
     *
     * @param string[] $ids A comma-separated list of line ids e.g. victoria,circle,N133. Max. approx. 20 ids. (required)
     * @param string $start_date  (required)
     * @param string $end_date  (required)
     * @param bool $detail Include details of the disruptions that are causing the line status including the affected stops and routes (optional)
     * @param \DateTime $date_range_start_date  (optional)
     * @param \DateTime $date_range_end_date  (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Line[]
     */
    public function status($ids, $start_date, $end_date, $detail = null, $date_range_start_date = null, $date_range_end_date = null)
    {
        /*
         * NOTE:
         * $date_range_start_date & $date_range_end_date are set to null here.
         * They correspond to query args: dateRange.startDate & dateRange.endDate
         * which appear to be superfluous or not working.
         */
        $date_range_start_date = null;
        $date_range_end_date = null;
        try {
            $return = $this->lineApi->lineStatus(
                $ids,
                $start_date,
                $end_date,
                $this->boolToStr($detail),
                $date_range_start_date,
                $date_range_end_date
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the line status of for given line ids e.g Minor Delays
     *
     * @param string[] $ids A comma-separated list of line ids e.g. victoria,circle,N133. Max. approx. 20 ids. (required)
     * @param bool $detail Include details of the disruptions that are causing the line status including the affected stops and routes (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Line[]
     */
    public function statusByIds($ids, $detail = null)
    {
        try {
            $return = $this->lineApi->lineStatusByIds(
                $ids,
                $this->boolToStr($detail)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the line status of for all lines for the given modes
     *
     * @param string[] $modes A comma-separated list of modes to filter by. e.g. tube,dlr (required)
     * @param bool $detail Include details of the disruptions that are causing the line status including the affected stops and routes (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Line[]
     */
    public function statusByMode($modes, $detail = null)
    {
        try {
            $return = $this->lineApi->lineStatusByMode(
                $modes,
                $this->boolToStr($detail)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the line status for all lines with a given severity
     * A list of valid severity codes can be obtained from a call to Line/Meta/Severity
     *
     * @param int $severity The level of severity (eg: a number from 0 to 14) (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Line[]
     */
    public function statusBySeverity($severity)
    {
        try {
            $return = $this->lineApi->lineStatusBySeverity($severity);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of the stations that serve the given line id
     *
     * @param string $id A single line id e.g. victoria (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StopPoint[]
     */
    public function stopPoints($id)
    {
        try {
            $return = $this->lineApi->lineStopPoints($id);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the timetable for a specified station on the give line
     *
     * @param string $from_stop_point_id The originating station&#39;s stop point id (station naptan code e.g. 940GZZLUASL, you can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name) (required)
     * @param string $id A single line id e.g. victoria (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\TimetableResponse
     */
    public function timetable($from_stop_point_id, $id)
    {
        try {
            $return = $this->lineApi->lineTimetable($from_stop_point_id, $id);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the timetable for a specified station on the give line with specified destination
     *
     * @param string $from_stop_point_id The originating station&#39;s stop point id (station naptan code e.g. 940GZZLUASL, you can use /StopPoint/Search/{query} endpoint to find a stop point id from a station name) (required)
     * @param string $id A single line id e.g. victoria (required)
     * @param string $to_stop_point_id The destination stations&#39;s Naptan code (required)
     * @throws \Abulia\TflUnified\Exceptions\WrapperException
     * @return \Abulia\TflUnified\Swagger\Model\TimetableResponse
     */
    public function timetableTo($from_stop_point_id, $id, $to_stop_point_id)
    {
        try {
            $return = $this->lineApi->lineTimetableTo($from_stop_point_id, $id, $to_stop_point_id);
        } catch(ApiException $e) {
            // If no valid route exists between specified stop points, API will return a totally inappropriate 500 error...
            $response = $e->getResponseBody();
            if (isset($response->httpStatusCode) && $response->httpStatusCode == 500) {
                if (preg_match('/No valid route found for/', $response->message)) {
                    throw WrapperException::fromApiException($e)
                        ->setWrapperErrorCode(self::ERROR_INVALID_ROUTE);
                }
            }
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
