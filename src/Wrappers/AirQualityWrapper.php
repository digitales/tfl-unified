<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\AirQualityApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class AirQualityWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class AirQualityWrapper extends Wrapper
{
    /**
     * @var null|AirQualityApi
     */
    protected $airQualityApi = null;

    /**
     * AirQualityWrapper constructor.
     * @param ApiService $apiService
     * @param null $airQualityApi
     */
    public function __construct(ApiService $apiService, $airQualityApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $airQualityApi) {
            $airQualityApi = new AirQualityApi($apiService->getApiClient());
        }

        $this->airQualityApi = $airQualityApi;
    }

    /**
     * Gets air quality data feed
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Object
     */
    public function get()
    {
        try {
            $return = $this->airQualityApi->airQualityGet();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
