<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\OccupancyApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class OccupancyWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class OccupancyWrapper extends Wrapper
{
    /**
     * @var null|OccupancyApi
     */
    protected $occupancyApi = null;

    /**
     * OccupancyWrapper constructor.
     * @param ApiService $apiService
     * @param null $occupancyApi
     */
    public function __construct(ApiService $apiService, $occupancyApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $occupancyApi) {
            $occupancyApi = new OccupancyApi($apiService->getApiClient());
        }

        $this->occupancyApi = $occupancyApi;
    }

    /**
     * Gets the occupancy for all car parks that have occupancy data
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\CarParkOccupancy[]
     */
    public function get()
    {
        try {
            $return = $this->occupancyApi->occupancyGet();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the occupancy for a car park with a given id
     *
     * @param string $id  (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\CarParkOccupancy
     */
    public function getById($id)
    {
        try {
            $return = $this->occupancyApi->occupancyGetById($id);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
