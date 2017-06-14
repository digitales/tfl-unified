<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\SearchApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class SearchWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class SearchWrapper extends Wrapper
{
    /**
     * @var null|SearchApi
     */
    protected $searchApi = null;

    /**
     * SearchWrapper constructor.
     * @param ApiService $apiService
     * @param null $searchApi
     */
    public function __construct(ApiService $apiService, $searchApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $searchApi) {
            $searchApi = new SearchApi($apiService->getApiClient());
        }

        $this->searchApi = $searchApi;
    }

    /**
     * Searches the bus schedules folder on S3 for a given bus number.
     *
     * @param string $query The search query (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\SearchResponse
     */
    public function busSchedules($query)
    {
        try {
            $return = $this->searchApi->searchBusSchedules($query);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Search the site for occurrences of the query string. The maximum number of results returned is equal to the
     * maximum page size of 100. To return subsequent pages, use the paginated overload.
     *
     * @param string $query The search query (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\SearchResponse
     */
    public function get($query)
    {
        try {
            $return = $this->searchApi->searchGet($query);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the available search categories.
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return string[]
     */
    public function metaCategories()
    {
        try {
            $return = $this->searchApi->searchMetaCategories();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the available searchProvider names.
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return string[]
     */
    public function metaSearchProviders()
    {
        try {
            $return = $this->searchApi->searchMetaSearchProviders();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the available sorting options.
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return string[]
     */
    public function metaSorts()
    {
        try {
            $return = $this->searchApi->searchMetaSorts();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
