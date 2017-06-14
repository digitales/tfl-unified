<?php

namespace Abulia\TflUnified\Wrappers;

use Abulia\TflUnified\ApiService;
use Abulia\TflUnified\Swagger\Api\JourneyApi;
use Abulia\TflUnified\Exceptions\WrapperException;
use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class JourneyWrapper
 * @package Abulia\TflUnified\Wrappers
 */
class JourneyWrapper extends Wrapper
{
    /**
     * @var null|JourneyApi
     */
    protected $journeyApi = null;

    /**
     * @var bool
     */
    protected $handleDisambiguation = false;

    /**
     * JourneyWrapper constructor.
     * @param ApiService $apiService
     * @param null $journeyApi
     */
    public function __construct(ApiService $apiService, $journeyApi = null)
    {
        $this->apiService = $apiService;

        if ( ! $journeyApi) {
            $journeyApi = new JourneyApi($apiService->getApiClient());
        }

        $this->journeyApi = $journeyApi;
    }

    /**
     * @param bool $handleDisambiguation
     * @return $this
     */
    public function withDisambiguation($handleDisambiguation = true)
    {
        if ( ! is_null($handleDisambiguation) && is_bool($handleDisambiguation)) {
            $this->handleDisambiguation = $handleDisambiguation;
        }

        return $this;
    }

    /**
     * Perform a Journey Planner search from the parameters specified in simple types
     *
     * @param string $from Origin of the journey. Can be WGS84 coordinates expressed as \&quot;lat,long\&quot;, a UK postcode, a Naptan (StopPoint) id, an ICS StopId, or a free-text string (will cause disambiguation unless it exactly matches a point of interest name). (required)
     * @param string $to Destination of the journey. Can be WGS84 coordinates expressed as \&quot;lat,long\&quot;, a UK postcode, a Naptan (StopPoint) id, an ICS StopId, or a free-text string (will cause disambiguation unless it exactly matches a point of interest name). (required)
     * @param string $via Travel through point on the journey. Can be WGS84 coordinates expressed as \&quot;lat,long\&quot;, a UK postcode, a Naptan (StopPoint) id, an ICS StopId, or a free-text string (will cause disambiguation unless it exactly matches a point of interest name). (optional)
     * @param bool $national_search Does the journey cover stops outside London? eg. \&quot;nationalSearch&#x3D;true\&quot; (optional)
     * @param string $date The date must be in yyyyMMdd format (optional)
     * @param string $time The time must be in HHmm format (optional)
     * @param string $time_is Does the time given relate to arrival or leaving time? Possible options: \&quot;departing\&quot; | \&quot;arriving\&quot; (optional)
     * @param string $journey_preference The journey preference eg possible options: \&quot;leastinterchange\&quot; | \&quot;leasttime\&quot; | \&quot;leastwalking\&quot; (optional)
     * @param string[] $mode The mode must be a comma separated list of modes. eg possible options: \&quot;public-bus,overground,train,tube,coach,dlr,cablecar,tram,river,walking,cycle\&quot; (optional)
     * @param string[] $accessibility_preference The accessibility preference must be a comma separated list eg. \&quot;noSolidStairs,noEscalators,noElevators,stepFreeToVehicle,stepFreeToPlatform\&quot; (optional)
     * @param string $from_name An optional name to associate with the origin of the journey in the results. (optional)
     * @param string $to_name An optional name to associate with the destination of the journey in the results. (optional)
     * @param string $via_name An optional name to associate with the via point of the journey in the results. (optional)
     * @param string $max_transfer_minutes The max walking time in minutes for transfer eg. \&quot;120\&quot; (optional)
     * @param string $max_walking_minutes The max walking time in minutes for journeys eg. \&quot;120\&quot; (optional)
     * @param string $walking_speed The walking speed. eg possible options: \&quot;slow\&quot; | \&quot;average\&quot; | \&quot;fast\&quot;. (optional)
     * @param string $cycle_preference The cycle preference. eg possible options: \&quot;allTheWay\&quot; | \&quot;leaveAtStation\&quot; | \&quot;takeOnTransport\&quot; | \&quot;cycleHire\&quot; (optional)
     * @param string $adjustment Time adjustment command. eg possible options: \&quot;TripFirst\&quot; | \&quot;TripLast\&quot; (optional)
     * @param string[] $bike_proficiency A comma separated list of cycling proficiency levels. eg possible options: \&quot;easy,moderate,fast\&quot; (optional)
     * @param bool $alternative_cycle Option to determine whether to return alternative cycling journey (optional)
     * @param bool $alternative_walking Option to determine whether to return alternative walking journey (optional)
     * @param bool $apply_html_markup Flag to determine whether certain text (e.g. walking instructions) should be output with HTML tags or not. (optional)
     * @param bool $use_multi_modal_call A boolean to indicate whether or not to return 3 public transport journeys, a bus journey, a cycle hire journey, a personal cycle journey and a walking journey (optional)
     * @param bool $walking_optimization A boolean to indicate whether to optimize journeys using walking (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\ItineraryResult or \Abulia\TflUnified\Swagger\Model\DisambiguationResult
     */
    public function journeyResults($from, $to, $via = null, $national_search = null, $date = null, $time = null, $time_is = null, $journey_preference = null, $mode = null, $accessibility_preference = null, $from_name = null, $to_name = null, $via_name = null, $max_transfer_minutes = null, $max_walking_minutes = null, $walking_speed = null, $cycle_preference = null, $adjustment = null, $bike_proficiency = null, $alternative_cycle = null, $alternative_walking = null, $apply_html_markup = null, $use_multi_modal_call = null, $walking_optimization = null)
    {
        try {
            $return = $this->journeyApi->journeyJourneyResults(
                $from,
                $to,
                $via,
                $this->boolToStr($national_search),
                $date,
                $time,
                $time_is,
                $journey_preference,
                $mode,
                $accessibility_preference,
                $from_name,
                $to_name,
                $via_name,
                $max_transfer_minutes,
                $max_walking_minutes,
                $walking_speed,
                $cycle_preference,
                $adjustment,
                $bike_proficiency,
                $this->boolToStr($alternative_cycle),
                $this->boolToStr($alternative_walking),
                $this->boolToStr($apply_html_markup),
                $this->boolToStr($use_multi_modal_call),
                $this->boolToStr($walking_optimization)
            );
        } catch(ApiException $e) {
            if ($e->getCode() == 300 && $this->handleDisambiguation) {
                return $e->getResponseObject();
            }
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }

    /**
     * Gets a list of all of the available journey planner modes
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Mode[]
     */
    public function meta()
    {
        try {
            $return = $this->journeyApi->journeyMeta();
        } catch(ApiException $e) {
            $this->apiService->logApiException($e);
            throw WrapperException::wrapException($e);
        }

        return $return;
    }
}
