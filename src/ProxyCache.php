<?php

namespace Abulia\TflUnified;

use Abulia\TflUnified\Wrappers\Wrapper;

/**
 * Class ProxyCache
 * @package Abulia\TflUnified
 */
class ProxyCache
{
    /**
     * Set of time/type wrappers.
     *
     * @var array
     */
    protected static $cachedProxies = [];

    /**
     * Cache timeout.
     *
     * @var
     */
    protected $cacheDuration;

    /**
     * Proxying for wrapper.

     * @var Wrapper
     */
    protected $wrapperClass;

    /**
     * ProxyCache constructor.
     * @param $cacheDuration
     * @param Wrapper $wrapperClass
     */
    private function __construct($cacheDuration, Wrapper $wrapperClass)
    {
        $this->cacheDuration = $cacheDuration;
        $this->wrapperClass = $wrapperClass;
    }

    /**
     * Get instance for time/type.
     *
     * @param $cacheDuration
     * @param Wrapper $wrapperClass
     * @return mixed
     */
    public static function getInstance($cacheDuration, Wrapper $wrapperClass)
    {
        if ( ! static::hasCachedProxy($cacheDuration, $wrapperClass)) {
            static::addCachedProxy(new static($cacheDuration, $wrapperClass));
        }

        return static::getCachedProxy($cacheDuration, $wrapperClass);
    }

    /**
     * Check proxy exists.
     *
     * @param $cacheDuration
     * @param $wrapperClass
     * @return bool
     */
    protected static function hasCachedProxy($cacheDuration, $wrapperClass)
    {
        return isset(static::$cachedProxies[get_class($wrapperClass)][$cacheDuration]);
    }

    /**
     * Get cached proxy.
     *
     * @param $cacheDuration
     * @param $wrapperClass
     * @return mixed
     */
    protected static function getCachedProxy($cacheDuration, $wrapperClass)
    {
        return static::$cachedProxies[get_class($wrapperClass)][$cacheDuration];
    }

    /**
     * Add a time/type caching proxy.
     *
     * @param ProxyCache $proxyCache
     */
    protected static function addCachedProxy(ProxyCache $proxyCache)
    {
        static::$cachedProxies[$proxyCache->proxyingFor()][$proxyCache->cacheDuration] = $proxyCache;
    }

    /**
     * Remove specific proxy.
     *
     * @param ProxyCache $proxyCache
     */
    protected static function removeCachedProxy(ProxyCache $proxyCache)
    {
        unset(static::$cachedProxies[$proxyCache->proxyingFor()][$proxyCache->cacheDuration]);
    }

    /**
     * @param $name
     * @param $arguments
     * @return string
     */
    public function makeCacheKey($name, $arguments)
    {
        return sha1(implode("|", array_merge(
            [
                $this->cacheDuration,
                $this->proxyingFor(),
                $name,
            ],
            $arguments
        )));
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function proxy($name, $arguments)
    {
        return call_user_func_array(
            [$this->wrapperClass, $name],
            $arguments
        );
    }

    /**
     * @return string
     */
    public function proxyingFor()
    {
        return get_class($this->wrapperClass);
    }

    /**
     * @return ApiService
     */
    public function getApiService()
    {
        return $this->wrapperClass->getApiService();
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if ($this->cacheDuration && $this->getApiService()->hasCache()) {
            $key = $this->makeCacheKey($name, $arguments);

            return $this->getApiService()->getCached($key, $this->cacheDuration, function() use ($name, $arguments) {
                return $this->proxy($name, $arguments);
            });
        }

        return $this->proxy($name, $arguments);
    }
}