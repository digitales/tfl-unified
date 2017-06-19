<?php

namespace Abulia\TflUnified;

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
     * Available APIs
     *
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
     * Cache instance.
     *
     * @var Cache
     */
    protected $cache;

    /**
     * Default cache duration.
     *
     * @var int
     */
    protected $defaultCacheDuration = 0;

    /**
     * Swagger generated ApiClient instance.
     *
     * @var ApiClient
     */
    protected $apiClient;

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
     * Get API client instance.
     *
     * @return mixed
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Get WrapperManager instance with specified cache duration.
     *
     * @param int $minutes
     * @return WrapperManager
     */
    public function cached($minutes = 60)
    {
        return new WrapperManager($this, $minutes);
    }

    /**
     * Get default cache duration.
     *
     * @return int
     */
    public function getDefaultCacheDuration()
    {
        return $this->defaultCacheDuration;
    }

    /**
     * Set default cache duration.
     *
     * @param $minutes
     * @return $this
     */
    public function setDefaultCacheDuration($minutes)
    {
        $this->defaultCacheDuration = $minutes;
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
        $return = null;

        try {
            $return = $this->getCache()->tags('tfl')->remember($key, $duration, $callable);
        } catch(\BadMethodCallException $e) {
            $return = $this->getCache()->remember($key, $duration, $callable);
        }

        return $return;
    }

    /**
     * Clear all cached data.
     * @return $this
     */
    public function clearCache()
    {
        try {
            $this->getCache()->tags('tfl')->flush();
        } catch(\BadMethodCallException $e) {
            $this->getCache()->flush();
        }

        return $this;
    }

    /**
     * Pass api calls to wrapper manager instance.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (in_array($name, static::$apiNames)) {
            return $this->cached($this->getDefaultCacheDuration())
                ->$name(...$arguments);
        }

        throw new \BadMethodCallException('Unknown method: ' . $name);
    }
}