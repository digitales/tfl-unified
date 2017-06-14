<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\TravelTimeApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class TravelTimeWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class TravelTimeWrapper extends Wrapper
{
    /**
     * @var null|TravelTimeApi
     */
    protected $travelTimeApi = null;

    /**
     * TravelTimeWrapper constructor.
     * @param ApiService $apiService
     * @param null $travelTimeApi
     */
    public function __construct(ApiService $apiService, $travelTimeApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $travelTimeApi) {
            $travelTimeApi = new TravelTimeApi($apiService->getApiClient());
        }

        $this->travelTimeApi = $travelTimeApi;
    }

    /**
     * Gets the TravelTime overlay.
     *
     * @param int $z The zoom level. (required)
     * @param double $pin_lat The latitude of the pin. (required)
     * @param double $pin_lon The longitude of the pin. (required)
     * @param double $map_center_lat The map center latitude. (required)
     * @param double $map_center_lon The map center longitude. (required)
     * @param string $scenario_title The title of the scenario. (required)
     * @param string $time_of_day_id The id for the time of day (AM/INTER/PM) (required)
     * @param string $mode_id The id of the mode. (required)
     * @param int $width The width of the requested overlay. (required)
     * @param int $height The height of the requested overlay. (required)
     * @param string $direction The direction of travel. (required)
     * @param int $travel_time_interval The total minutes between the travel time bands (required)
     * @param string $compare_type  (required)
     * @param string $compare_value  (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Object
     */
    public function getCompareOverlay($z, $pin_lat, $pin_lon, $map_center_lat, $map_center_lon, $scenario_title, $time_of_day_id, $mode_id, $width, $height, $direction, $travel_time_interval, $compare_type, $compare_value)
    {
        try {
            $return = $this->travelTimeApi->travelTimeGetCompareOverlay(
                $z,
                $pin_lat,
                $pin_lon,
                $map_center_lat,
                $map_center_lon,
                $scenario_title,
                $time_of_day_id,
                $mode_id,
                $width,
                $height,
                $direction,
                $travel_time_interval,
                $compare_type,
                $compare_value
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the TravelTime overlay.
     *
     * @param int $z The zoom level. (required)
     * @param double $pin_lat The latitude of the pin. (required)
     * @param double $pin_lon The longitude of the pin. (required)
     * @param double $map_center_lat The map center latitude. (required)
     * @param double $map_center_lon The map center longitude. (required)
     * @param string $scenario_title The title of the scenario. (required)
     * @param string $time_of_day_id The id for the time of day (AM/INTER/PM) (required)
     * @param string $mode_id The id of the mode. (required)
     * @param int $width The width of the requested overlay. (required)
     * @param int $height The height of the requested overlay. (required)
     * @param string $direction The direction of travel. (required)
     * @param int $travel_time_interval The total minutes between the travel time bands (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Object
     */
    public function getOverlay($z, $pin_lat, $pin_lon, $map_center_lat, $map_center_lon, $scenario_title, $time_of_day_id, $mode_id, $width, $height, $direction, $travel_time_interval)
    {
        try {
            $return = $this->travelTimeApi->travelTimeGetOverlay(
                $z,
                $pin_lat,
                $pin_lon,
                $map_center_lat,
                $map_center_lon,
                $scenario_title,
                $time_of_day_id,
                $mode_id,
                $width,
                $height,
                $direction,
                $travel_time_interval
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
