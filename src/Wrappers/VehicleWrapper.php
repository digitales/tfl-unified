<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\VehicleApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class VehicleWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class VehicleWrapper extends Wrapper
{
    /**
     * @var null|VehicleApi
     */
    protected $vehicleApi = null;

    /**
     * VehicleWrapper constructor.
     * @param ApiService $apiService
     * @param null $vehicleApi
     */
    public function __construct(ApiService $apiService, $vehicleApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $vehicleApi) {
            $vehicleApi = new VehicleApi($apiService->getApiClient());
        }

        $this->vehicleApi = $vehicleApi;
    }

    /**
     * Gets the predictions for a given list of vehicle Id's.
     *
     * @param string[] $ids A comma-separated list of vehicle ids e.g. LX58CFV,LX11AZB,LX58CFE. Max approx. 25 ids. (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Prediction[]
     */
    public function get($ids)
    {
        try {
            $return = $this->vehicleApi->vehicleGet($ids);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the Emissions Surcharge compliance for the Vehicle
     *
     * @param string $vrm The Vehicle Registration Mark (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\EmissionsSurchargeVehicle
     */
    public function getVehicle($vrm)
    {
        try {
            $return = $this->vehicleApi->vehicleGetVehicle($vrm);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
