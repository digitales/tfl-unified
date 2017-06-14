<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\AccidentStatsApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;


/**
 * Class AccidentStatsWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class AccidentStatsWrapper extends Wrapper
{
    /**
     * @var null|AccidentStatsApi
     */
    protected $accidentStatsApi = null;

    /**
     * AccidentStatsWrapper constructor.
     * @param ApiService $apiService
     * @param null $accidentStatsApi
     */
    public function __construct(ApiService $apiService, $accidentStatsApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $accidentStatsApi) {
            $accidentStatsApi = new AccidentStatsApi($apiService->getApiClient());
        }

        $this->accidentStatsApi = $accidentStatsApi;
    }

    /**
     * Gets all accident details for accidents occurring in the specified year
     *
     * NOTE: If the year is valid but unrecognised, rather than doing something sensible like
     *       returning an empty set, this request will rather annoyingly return a 400 error code.
     *
     * @param int $year The year for which to filter the accidents on. (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\AccidentDetail[]
     */
    public function get($year)
    {
        try {
            $return = $this->accidentStatsApi->accidentStatsGet($year);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
