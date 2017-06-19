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
    public function __construct($cacheDuration, Wrapper $wrapperClass)
    {
        $this->cacheDuration = $cacheDuration;
        $this->wrapperClass = $wrapperClass;
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