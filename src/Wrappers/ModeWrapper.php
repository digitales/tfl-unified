<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\ModeApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class ModeWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class ModeWrapper extends Wrapper
{
    /**
     * @var null|ModeApi
     */
    protected $modeApi = null;

    /**
     * ModeWrapper constructor.
     * @param ApiService $apiService
     * @param null $modeApi
     */
    public function __construct(ApiService $apiService, $modeApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $modeApi) {
            $modeApi = new ModeApi($apiService->getApiClient());
        }

        $this->modeApi = $modeApi;
    }

    /**
     * Gets the next arrival predictions for all stops of a given mode
     *
     * @param string $mode A mode name e.g. tube, dlr (required)
     * @param int $count A number of arrivals to return for each stop, -1 to return all available. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Prediction[]
     */
    public function arrivals($mode, $count = null)
    {
        try {
            $return = $this->modeApi->modeArrivals($mode, $count);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Returns the service type active for a mode.
     * Currently only supports tube
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\ActiveServiceType[]
     */
    public function getActiveServiceTypes()
    {
        try {
            $return = $this->modeApi->modeGetActiveServiceTypes();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
