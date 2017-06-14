<?php

namespace Abulia\TflUnified\Wrappers;

/**
 * Class Wrapper
 * @package Abulia\TflUnified\Wrappers
 */
class Wrapper
{
    /**
     * @var
     */
    protected $apiService;

    /**
     * Return bools are strings - Tfl API doesn't like integer booleans
     *
     * @param $val
     * @return string
     */
    protected function boolToStr($val)
    {
        if ( ! is_bool($val)) {
            return $val;
        }

        return $val ? 'true' : 'false';
    }

    /**
     * @return ApiService
     */
    public function getApiService()
    {
        return $this->apiService;
    }
}