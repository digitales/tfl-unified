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
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Logging\Log;
use Abulia\TflUnified\Swagger\ApiException;
use Abulia\TflUnified\Swagger\Configuration;
use Illuminate\Contracts\Cache\Repository as Cache;

/**
 * Class ApiService
 * @package Abulia\TflUnified
 */
class ApiService
{
    /**
     * @var array
     */
    public static $apiNames = [
        "accidentStats",
        "airQuality",
        "bikePoint",
        "cabwise",
        "journey",
        "line",
        "mode",
        "occupancy",
        "place",
        "road",
        "search",
        "stopPoint",
        "travelTime",
        "vehicle",
    ];

    /**
     * Laravel container instance.
     *
     * @var Container
     */
    protected $app;

    /**
     * Config settings.
     *
     * @var array
     */
    protected $config;

    /**
     * Optional logger instance.
     *
     * @var Log
     */
    protected $logger;

    /**
     * Current cache duration.
     *
     * @var int
     */
    protected $cacheDuration = 0;

    /**
     * Cache instance.
     *
     * @var Cache
     */
    protected $cache;

    /**
     * Swagger generated ApiClient instance.
     *
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * Wrappers
     */
    protected $accidentStatsWrapper;
    protected $airQualityWrapper;
    protected $bikePointWrapper;
    protected $cabwiseWrapper;
    protected $journeyWrapper;
    protected $lineWrapper;
    protected $modeWrapper;
    protected $occupancyWrapper;
    protected $placeWrapper;
    protected $roadWrapper;
    protected $searchWrapper;
    protected $travelTimeWrapper;
    protected $stopPointWrapper;
    protected $vehicleWrapper;

    /**
     * ApiService constructor.
     * @param array $config
     * @param Container $app
     */
    public function __construct($config = null, $app)
    {
        $this->init($config);
        $this->app = $app;
    }

    /**
     * Initialise api settings.
     *
     * @param array $config
     * @return $this|bool
     */
    public function init($config)
    {
        if ( ! $config) {
            return false;
        }

        Configuration::getDefaultConfiguration()
            ->setHost($config['host_uri'])
            ->setUserAgent($config['user_agent'])
            ->setDebug($config['debug'])
            ->setDebugFile($config['debug_file'])
            ->setApiKey('app_id', $config['app_id'])
            ->setApiKey('app_key', $config['app_key'])
            ->setCurlTimeout($config['timeout'])
            ->setCurlConnectTimeout($config['connect_timeout'])
            ->setCurlProxyHost($config['proxy_host'])
            ->setCurlProxyType($config['proxy_type'])
            ->setCurlProxyPort($config['proxy_port'])
            ->setCurlProxyUser($config['proxy_user'])
            ->setCurlProxyPassword($config['proxy_password']);

        $this->config = $config;

        return $this;
    }

    /**
     * Get logger instance.
     *
     * @return mixed
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * Set logger instance.
     *
     * @param mixed $logger
     */
    public function setLogger(Log $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Format exception.
     *
     * @param ApiException $exception
     * @return string
     */
    protected function formatException(ApiException $exception)
    {
        $return = [];
        foreach ((array)$exception->getResponseBody() as $key => $value) {
            $return[] = "\t[$key] => $value";
        }
        return "ApiException\n". implode("\n", $return);
    }

    /**
     * Log API exception.
     *
     * @param ApiException $exception
     * @return $this
     */
    public function logApiException(ApiException $exception)
    {
        if ($logger = $this->getLogger()) {
            $logger->debug($this->formatException($exception));
        }
        return $this;
    }

    /**
     * Get AccidentStats API
     *
     * @return ProxyCache
     */
    public function accidentStats()
    {
        if ( ! $this->accidentStatsWrapper) {
            $this->accidentStatsWrapper = new AccidentStatsWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->accidentStatsWrapper);
    }

    /**
     * Get AirQuality API
     *
     * @return ProxyCache
     */
    public function airQuality()
    {
        if ( ! $this->airQualityWrapper) {
            $this->airQualityWrapper = new AirQualityWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->airQualityWrapper);
    }

    /**
     * Get BikePoint API
     *
     * @return ProxyCache
     */
    public function bikePoint()
    {
        if ( ! $this->bikePointWrapper) {
            $this->bikePointWrapper = new BikePointWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->bikePointWrapper);
    }

    /**
     * Get CabWise API
     *
     * @return ProxyCache
     */
    public function cabwise()
    {
        if ( ! $this->cabwiseWrapper) {
            $this->cabwiseWrapper = new CabwiseWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->cabwiseWrapper);
    }

    /**
     * Get Journey API
     *
     * @return ProxyCache
     */
    public function journey()
    {
        if ( ! $this->journeyWrapper) {
            $this->journeyWrapper = new JourneyWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->journeyWrapper);
    }

    /**
     * Get Line API
     *
     * @return ProxyCache
     */
    public function line()
    {
        if ( ! $this->lineWrapper) {
            $this->lineWrapper = new LineWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->lineWrapper);
    }

    /**
     * Get Mode API
     *
     * @return ProxyCache
     */
    public function mode()
    {
        if ( ! $this->modeWrapper) {
            $this->modeWrapper = new ModeWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->modeWrapper);
    }

    /**
     * Get Occupancy API
     *
     * @return ProxyCache
     */
    public function occupancy()
    {
        if ( ! $this->occupancyWrapper) {
            $this->occupancyWrapper = new OccupancyWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->occupancyWrapper);
    }

    /**
     * Get Place API
     *
     * @return ProxyCache
     */
    public function place()
    {
        if ( ! $this->placeWrapper) {
            $this->placeWrapper = new PlaceWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->placeWrapper);
    }

    /**
     * Get Road API
     *
     * @return ProxyCache
     */
    public function road()
    {
        if ( ! $this->roadWrapper) {
            $this->roadWrapper = new RoadWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->roadWrapper);
    }

    /**
     * Get Search API
     *
     * @return ProxyCache
     */
    public function search()
    {
        if ( ! $this->searchWrapper) {
            $this->searchWrapper = new SearchWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->searchWrapper);
    }

    /**
     * Get StopPoint API
     *
     * @return ProxyCache
     */
    public function stopPoint()
    {
        if ( ! $this->stopPointWrapper) {
            $this->stopPointWrapper = new StopPointWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->stopPointWrapper);
    }

    /**
     * Get TravelTime API
     *
     * @return ProxyCache
     */
    public function travelTime()
    {
        if ( ! $this->travelTimeWrapper) {
            $this->travelTimeWrapper = new TravelTimeWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->travelTimeWrapper);
    }

    /**
     * Get Vehicle API
     *
     * @return ProxyCache
     */
    public function vehicle()
    {
        if ( ! $this->vehicleWrapper) {
            $this->vehicleWrapper = new VehicleWrapper($this);
        }

        return ProxyCache::getInstance($this->getCacheDuration(), $this->vehicleWrapper);
    }

    /**
     * Get API client instance.
     *
     * @return mixed
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set current cache duration.
     *
     * @param int $minutes
     * @return $this
     */
    public function cached($minutes = 60)
    {
        $this->setCacheDuration($minutes);
        return $this;
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
     * Get cache instance.
     *
     * @return Cache
     */
    public function getCache()
    {
        if (is_null($this->cache)) {
            $this->cache = $this->app->make('cache');
        }
        return $this->cache;
    }

    /**
     * Set cache instance.
     *
     * @param Cache $cache
     * @return $this
     */
    public function setCache(Cache $cache)
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * Check if cache set.
     *
     * @return bool
     */
    public function hasCache()
    {
        return !! $this->getCache();
    }

    /**
     * Get cached data.
     *
     * @param $key
     * @param $duration
     * @param $callable
     * @return mixed
     */
    public function getCached($key, $duration, $callable)
    {
        return $this->getCache()->tags('tfl')->remember($key, $duration, $callable);
    }

    /**
     * Clear all cached data.
     * @return $this
     */
    public function clearCache()
    {
        $this->getCache()->tags('tfl')->flush();
        return $this;
    }
}