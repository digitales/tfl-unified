<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\BikePointApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class BikePointWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class BikePointWrapper extends Wrapper
{
    /**
     * @var null|BikePointApi
     */
    protected $bikePointApi = null;

    /**
     * BikePointWrapper constructor.
     * @param ApiService $apiService
     * @param null $bikePointApi
     */
    public function __construct(ApiService $apiService, $bikePointApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $bikePointApi) {
            $bikePointApi = new BikePointApi($apiService->getApiClient());
        }

        $this->bikePointApi = $bikePointApi;
    }

    /**
     * Gets the bike point with the given id.
     *
     * @param string $id A bike point id (a list of ids can be obtained from the above BikePoint call) (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Place
     */
    public function get($id)
    {
        try {
            $return = $this->bikePointApi->bikePointGet($id);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets all bike point locations. The Place object has an addtionalProperties array which contains the nbBikes,
     * nbDocks and nbSpaces numbers which give the status of the BikePoint. A mismatch in these numbers
     * i.e. nbDocks - (nbBikes + nbSpaces) != 0 indicates broken docks.
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Place[]
     */
    public function getAll()
    {
        try {
            $return = $this->bikePointApi->bikePointGetAll();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Search for bike stations by their name, a bike point's name often contains information about the name of the
     * street or nearby landmarks, for example. Note that the search result does not contain the PlaceProperties
     * i.e. the status or occupancy of the BikePoint, to get that information you should retrieve the
     * BikePoint by its id on /BikePoint/id.
     *
     * @param string $query The search term e.g. \&quot;St. James\&quot; (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Place[]
     */
    public function search($query)
    {
        try {
            $return = $this->bikePointApi->bikePointSearch($query);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
