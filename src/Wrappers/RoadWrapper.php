<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\RoadApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class RoadWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class RoadWrapper extends Wrapper
{
    /**
     * @var null|RoadApi
     */
    protected $roadApi = null;

    /**
     * RoadWrapper constructor.
     * @param ApiService $apiService
     * @param null $roadApi
     */
    public function __construct(ApiService $apiService, $roadApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $roadApi) {
            $roadApi = new RoadApi($apiService->getApiClient());
        }

        $this->roadApi = $roadApi;
    }

    /**
     * Gets a list of disrupted streets. If no date filters are provided, current disruptions are returned.
     *
     * @param \DateTime $start_date Optional, the start time to filter on. (required)
     * @param \DateTime $end_date Optional, The end time to filter on. (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Object
     */
    public function disruptedStreets($start_date, $end_date)
    {
        try {
            $return = $this->roadApi->roadDisruptedStreets($start_date, $end_date);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Get active disruptions, filtered by road ids
     *
     * @param string[] $ids Comma-separated list of road identifiers e.g. \&quot;A406, A2\&quot; use all for all to ignore id filter (a full list of supported road identifiers can be found at the /Road/ endpoint) (required)
     * @param bool $strip_content Optional, defaults to false. When true, removes every property/node except for id, point, severity, severityDescription, startDate, endDate, corridor details, location, comments and streets (optional)
     * @param string[] $severities an optional list of Severity names to filter on (a valid list of severities can be obtained from the /Road/Meta/severities endpoint) (optional)
     * @param string[] $categories an optional list of category names to filter on (a valid list of categories can be obtained from the /Road/Meta/categories endpoint) (optional)
     * @param bool $closures Optional, defaults to true. When true, always includes disruptions that have road closures, regardless of the severity filter. When false, the severity filter works as normal. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\RoadDisruption[]
     */
    public function disruption($ids, $strip_content = null, $severities = null, $categories = null, $closures = null)
    {
        try {
            $return = $this->roadApi->roadDisruption(
                $ids,
                $this->boolToStr($strip_content),
                $severities,
                $categories,
                $this->boolToStr($closures)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of active disruptions filtered by disruption Ids.
     *
     * @param string[] $disruption_ids Comma-separated list of disruption identifiers to filter by. (required)
     * @param bool $strip_content Optional, defaults to false. When true, removes every property/node except for id, point, severity, severityDescription, startDate, endDate, corridor details, location and comments. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\RoadDisruption
     */
    public function disruptionById($disruption_ids, $strip_content = null)
    {
        try {
            $return = $this->roadApi->roadDisruptionById(
                $disruption_ids,
                $this->boolToStr($strip_content)
            );
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets all roads managed by TfL
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\RoadCorridor[]
     */
    public function get()
    {
        try {
            $return = $this->roadApi->roadGet();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the road with the specified id (e.g. A1)
     *
     * @param string[] $ids Comma-separated list of road identifiers e.g. \&quot;A406, A2\&quot; (a full list of supported road identifiers can be found at the /Road/ endpoint) (required)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\RoadCorridor[]
     */
    public function getById($ids)
    {
        try {
            $return = $this->roadApi->roadGetById($ids);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of valid RoadDisruption categories
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return string[]
     */
    public function metaCategories()
    {
        try {
            $return = $this->roadApi->roadMetaCategories();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of valid RoadDisruption severity codes
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\StatusSeverity[]
     */
    public function metaSeverities()
    {
        try {
            $return = $this->roadApi->roadMetaSeverities();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets the specified roads with the status aggregated over the date range specified, or now until the end of today if no dates are passed.
     *
     * @param string[] $ids Comma-separated list of road identifiers e.g. \&quot;A406, A2\&quot; or use \&quot;all\&quot; to ignore id filter (a full list of supported road identifiers can be found at the /Road/ endpoint) (required)
     * @param \DateTime $date_range_nullable_start_date  (optional)
     * @param \DateTime $date_range_nullable_end_date  (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\RoadCorridor[]
     */
    public function status($ids, $date_range_nullable_start_date = null, $date_range_nullable_end_date = null)
    {
        try {
            $return = $this->roadApi->roadStatus($ids, $date_range_nullable_start_date, $date_range_nullable_end_date);
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
