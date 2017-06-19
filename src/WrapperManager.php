<?php

namespace Abulia\TflUnified;

use Abulia\TflUnified\Wrappers\AccidentStatsWrapper;
use Abulia\TflUnified\Wrappers\AirQualityWrapper;
use Abulia\TflUnified\Wrappers\BikePointWrapper;
use Abulia\TflUnified\Wrappers\CabwiseWrapper;
use Abulia\TflUnified\Wrappers\JourneyWrapper;
use Abulia\TflUnified\Wrappers\LineWrapper;
use Abulia\TflUnified\Wrappers\ModeWrapper;
use Abulia\TflUnified\Wrappers\OccupancyWrapper;
use Abulia\TflUnified\Wrappers\PlaceWrapper;
use Abulia\TflUnified\Wrappers\RoadWrapper;
use Abulia\TflUnified\Wrappers\SearchWrapper;
use Abulia\TflUnified\Wrappers\StopPointWrapper;
use Abulia\TflUnified\Wrappers\TravelTimeWrapper;
use Abulia\TflUnified\Wrappers\VehicleWrapper;

/**
 * Class WrapperManager
 * @package Abulia\TflUnified
 */
class WrapperManager
{
    /**
     * ApiService instance.
     *
     * @var ApiService
     */
    protected $apiService;

    /**
     * Cache duration to use for this manager instance.
     *
     * @var int
     */
    protected $cacheDuration = 0;

    /**
     * WrapperManager constructor.
     * @param ApiService $apiService
     * @param int $cacheDuration
     */
    public function __construct(ApiService $apiService, $cacheDuration = 0)
    {
        $this->apiService = $apiService;
        $this->cacheDuration = $cacheDuration;
    }

    /**
     * Get current cache duration.
     *
     * @return int
     */
    public function getCacheDuration()
    {
        return $this->cacheDuration;
    }

    /**
     * Set current cache duration.
     *
     * @param int $minutes
     * @return $this
     */
    public function setCacheDuration($minutes)
    {
        $this->cacheDuration = $minutes;
        return $this;
    }

    /**
     * @return ApiService
     */
    public function getApiService()
    {
        return $this->apiService;
    }

    /**
     * Get AccidentStats API
     *
     * @return ProxyCache
     */
    public function accidentStats()
    {
        return new ProxyCache($this->getCacheDuration(), new AccidentStatsWrapper($this->getApiService()));
    }

    /**
     * Get AirQuality API
     *
     * @return ProxyCache
     */
    public function airQuality()
    {
        return new ProxyCache($this->getCacheDuration(), new AirQualityWrapper($this->getApiService()));
    }

    /**
     * Get BikePoint API
     *
     * @return ProxyCache
     */
    public function bikePoint()
    {
        return new ProxyCache($this->getCacheDuration(), new BikePointWrapper($this->getApiService()));
    }

    /**
     * Get CabWise API
     *
     * @return ProxyCache
     */
    public function cabwise()
    {
        return new ProxyCache($this->getCacheDuration(), new CabwiseWrapper($this->getApiService()));
    }

    /**
     * Get Journey API
     *
     * @return ProxyCache
     */
    public function journey()
    {
        return new ProxyCache($this->getCacheDuration(), new JourneyWrapper($this->getApiService()));
    }

    /**
     * Get Line API
     *
     * @return ProxyCache
     */
    public function line()
    {
        return new ProxyCache($this->getCacheDuration(), new LineWrapper($this->getApiService()));
    }

    /**
     * Get Mode API
     *
     * @return ProxyCache
     */
    public function mode()
    {
        return new ProxyCache($this->getCacheDuration(), new ModeWrapper($this->getApiService()));
    }

    /**
     * Get Occupancy API
     *
     * @return ProxyCache
     */
    public function occupancy()
    {
        return new ProxyCache($this->getCacheDuration(), new OccupancyWrapper($this->getApiService()));
    }

    /**
     * Get Place API
     *
     * @return ProxyCache
     */
    public function place()
    {
        return new ProxyCache($this->getCacheDuration(), new PlaceWrapper($this->getApiService()));
    }

    /**
     * Get Road API
     *
     * @return ProxyCache
     */
    public function road()
    {
        return new ProxyCache($this->getCacheDuration(), new RoadWrapper($this->getApiService()));
    }

    /**
     * Get Search API
     *
     * @return ProxyCache
     */
    public function search()
    {
        return new ProxyCache($this->getCacheDuration(), new SearchWrapper($this->getApiService()));
    }

    /**
     * Get StopPoint API
     *
     * @return ProxyCache
     */
    public function stopPoint()
    {
        return new ProxyCache($this->getCacheDuration(), new StopPointWrapper($this->getApiService()));
    }

    /**
     * Get TravelTime API
     *
     * @return ProxyCache
     */
    public function travelTime()
    {
        return new ProxyCache($this->getCacheDuration(), new TravelTimeWrapper($this->getApiService()));
    }

    /**
     * Get Vehicle API
     *
     * @return ProxyCache
     */
    public function vehicle()
    {
        return new ProxyCache($this->getCacheDuration(), new VehicleWrapper($this->getApiService()));
    }
}