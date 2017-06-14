<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\CabwiseApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class CabwiseWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class CabwiseWrapper extends Wrapper
{
    /**
     * @var null|CabwiseApi
     */
    protected $cabwiseApi = null;

    /**
     * CabwiseWrapper constructor.
     * @param ApiService $apiService
     * @param null $cabwiseApi
     */
    public function __construct(ApiService $apiService, $cabwiseApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $cabwiseApi) {
            $cabwiseApi = new CabwiseApi($apiService->getApiClient());
        }

        $this->cabwiseApi = $cabwiseApi;
    }

    /**
     * Gets taxis and minicabs contact information
     *
     * @param double $lat Latitude (required)
     * @param double $lon Longitude (required)
     * @param string $optype Operator Type e.g Minicab, Executive, Limousine (optional)
     * @param string $wc Wheelchair accessible (optional)
     * @param double $radius The radius of the bounding circle in metres (optional)
     * @param string $name Trading name of operating company (optional)
     * @param int $max_results An optional parameter to limit the number of results return. Default and maximum is 20. (optional)
     * @param bool $legacy_format Legacy Format (optional)
     * @param bool $force_xml Force Xml (optional)
     * @param bool $twenty_four_seven_only Twenty Four Seven Only (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Object
     */
    public function get($lat, $lon, $optype = null, $wc = null, $radius = null, $name = null, $max_results = null, $legacy_format = null, $force_xml = null, $twenty_four_seven_only = null)
    {
        try {
            $return = $this->cabwiseApi->cabwiseGet(
                $lat,
                $lon,
                $optype,
                $wc,
                $radius,
                $name,
                $max_results,
                $this->boolToStr($legacy_format),
                $this->boolToStr($force_xml),
                $this->boolToStr($twenty_four_seven_only)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
