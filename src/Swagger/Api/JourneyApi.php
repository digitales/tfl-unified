<?php
/**
 * JourneyApi
 * PHP version 5
 *
 * @category Class
 * @package  Abulia\TflUnified\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Transport for London Unified API
 *
 * No description provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)
 *
 * OpenAPI spec version: v1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Abulia\TflUnified\Swagger\Api;

use \Abulia\TflUnified\Swagger\ApiClient;
use \Abulia\TflUnified\Swagger\ApiException;
use \Abulia\TflUnified\Swagger\Configuration;
use \Abulia\TflUnified\Swagger\ObjectSerializer;

/**
 * JourneyApi Class Doc Comment
 *
 * @category Class
 * @package  Abulia\TflUnified\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class JourneyApi
{
    /**
     * API Client
     *
     * @var \Abulia\TflUnified\Swagger\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \Abulia\TflUnified\Swagger\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\Abulia\TflUnified\Swagger\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Abulia\TflUnified\Swagger\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Abulia\TflUnified\Swagger\ApiClient $apiClient set the API client
     *
     * @return JourneyApi
     */
    public function setApiClient(\Abulia\TflUnified\Swagger\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation journeyJourneyResults
     *
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
     * @return \Abulia\TflUnified\Swagger\Model\ItineraryResult
     */
    public function journeyJourneyResults($from, $to, $via = null, $national_search = null, $date = null, $time = null, $time_is = null, $journey_preference = null, $mode = null, $accessibility_preference = null, $from_name = null, $to_name = null, $via_name = null, $max_transfer_minutes = null, $max_walking_minutes = null, $walking_speed = null, $cycle_preference = null, $adjustment = null, $bike_proficiency = null, $alternative_cycle = null, $alternative_walking = null, $apply_html_markup = null, $use_multi_modal_call = null, $walking_optimization = null)
    {
        list($response) = $this->journeyJourneyResultsWithHttpInfo($from, $to, $via, $national_search, $date, $time, $time_is, $journey_preference, $mode, $accessibility_preference, $from_name, $to_name, $via_name, $max_transfer_minutes, $max_walking_minutes, $walking_speed, $cycle_preference, $adjustment, $bike_proficiency, $alternative_cycle, $alternative_walking, $apply_html_markup, $use_multi_modal_call, $walking_optimization);
        return $response;
    }

    /**
     * Operation journeyJourneyResultsWithHttpInfo
     *
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
     * @return array of \Abulia\TflUnified\Swagger\Model\ItineraryResult, HTTP status code, HTTP response headers (array of strings)
     */
    public function journeyJourneyResultsWithHttpInfo($from, $to, $via = null, $national_search = null, $date = null, $time = null, $time_is = null, $journey_preference = null, $mode = null, $accessibility_preference = null, $from_name = null, $to_name = null, $via_name = null, $max_transfer_minutes = null, $max_walking_minutes = null, $walking_speed = null, $cycle_preference = null, $adjustment = null, $bike_proficiency = null, $alternative_cycle = null, $alternative_walking = null, $apply_html_markup = null, $use_multi_modal_call = null, $walking_optimization = null)
    {
        // verify the required parameter 'from' is set
        if ($from === null) {
            throw new \InvalidArgumentException('Missing the required parameter $from when calling journeyJourneyResults');
        }
        // verify the required parameter 'to' is set
        if ($to === null) {
            throw new \InvalidArgumentException('Missing the required parameter $to when calling journeyJourneyResults');
        }
        // parse inputs
        $resourcePath = "/Journey/JourneyResults/{from}/to/{to}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json', 'text/json', 'application/xml', 'text/xml']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($via !== null) {
            $queryParams['via'] = $this->apiClient->getSerializer()->toQueryValue($via);
        }
        // query params
        if ($national_search !== null) {
            $queryParams['nationalSearch'] = $this->apiClient->getSerializer()->toQueryValue($national_search);
        }
        // query params
        if ($date !== null) {
            $queryParams['date'] = $this->apiClient->getSerializer()->toQueryValue($date);
        }
        // query params
        if ($time !== null) {
            $queryParams['time'] = $this->apiClient->getSerializer()->toQueryValue($time);
        }
        // query params
        if ($time_is !== null) {
            $queryParams['timeIs'] = $this->apiClient->getSerializer()->toQueryValue($time_is);
        }
        // query params
        if ($journey_preference !== null) {
            $queryParams['journeyPreference'] = $this->apiClient->getSerializer()->toQueryValue($journey_preference);
        }
        // query params
        if (is_array($mode)) {
            $mode = $this->apiClient->getSerializer()->serializeCollection($mode, 'csv', true);
        }
        if ($mode !== null) {
            $queryParams['mode'] = $this->apiClient->getSerializer()->toQueryValue($mode);
        }
        // query params
        if (is_array($accessibility_preference)) {
            $accessibility_preference = $this->apiClient->getSerializer()->serializeCollection($accessibility_preference, 'csv', true);
        }
        if ($accessibility_preference !== null) {
            $queryParams['accessibilityPreference'] = $this->apiClient->getSerializer()->toQueryValue($accessibility_preference);
        }
        // query params
        if ($from_name !== null) {
            $queryParams['fromName'] = $this->apiClient->getSerializer()->toQueryValue($from_name);
        }
        // query params
        if ($to_name !== null) {
            $queryParams['toName'] = $this->apiClient->getSerializer()->toQueryValue($to_name);
        }
        // query params
        if ($via_name !== null) {
            $queryParams['viaName'] = $this->apiClient->getSerializer()->toQueryValue($via_name);
        }
        // query params
        if ($max_transfer_minutes !== null) {
            $queryParams['maxTransferMinutes'] = $this->apiClient->getSerializer()->toQueryValue($max_transfer_minutes);
        }
        // query params
        if ($max_walking_minutes !== null) {
            $queryParams['maxWalkingMinutes'] = $this->apiClient->getSerializer()->toQueryValue($max_walking_minutes);
        }
        // query params
        if ($walking_speed !== null) {
            $queryParams['walkingSpeed'] = $this->apiClient->getSerializer()->toQueryValue($walking_speed);
        }
        // query params
        if ($cycle_preference !== null) {
            $queryParams['cyclePreference'] = $this->apiClient->getSerializer()->toQueryValue($cycle_preference);
        }
        // query params
        if ($adjustment !== null) {
            $queryParams['adjustment'] = $this->apiClient->getSerializer()->toQueryValue($adjustment);
        }
        // query params
        if (is_array($bike_proficiency)) {
            $bike_proficiency = $this->apiClient->getSerializer()->serializeCollection($bike_proficiency, 'csv', true);
        }
        if ($bike_proficiency !== null) {
            $queryParams['bikeProficiency'] = $this->apiClient->getSerializer()->toQueryValue($bike_proficiency);
        }
        // query params
        if ($alternative_cycle !== null) {
            $queryParams['alternativeCycle'] = $this->apiClient->getSerializer()->toQueryValue($alternative_cycle);
        }
        // query params
        if ($alternative_walking !== null) {
            $queryParams['alternativeWalking'] = $this->apiClient->getSerializer()->toQueryValue($alternative_walking);
        }
        // query params
        if ($apply_html_markup !== null) {
            $queryParams['applyHtmlMarkup'] = $this->apiClient->getSerializer()->toQueryValue($apply_html_markup);
        }
        // query params
        if ($use_multi_modal_call !== null) {
            $queryParams['useMultiModalCall'] = $this->apiClient->getSerializer()->toQueryValue($use_multi_modal_call);
        }
        // query params
        if ($walking_optimization !== null) {
            $queryParams['walkingOptimization'] = $this->apiClient->getSerializer()->toQueryValue($walking_optimization);
        }
        // path params
        if ($from !== null) {
            $resourcePath = str_replace(
                "{" . "from" . "}",
                $this->apiClient->getSerializer()->toPathValue($from),
                $resourcePath
            );
        }
        // path params
        if ($to !== null) {
            $resourcePath = str_replace(
                "{" . "to" . "}",
                $this->apiClient->getSerializer()->toPathValue($to),
                $resourcePath
            );
        }
        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('app_key');
        if (strlen($apiKey) !== 0) {
            $queryParams['app_key'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('app_id');
        if (strlen($apiKey) !== 0) {
            $queryParams['app_id'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Abulia\TflUnified\Swagger\Model\ItineraryResult',
                '/Journey/JourneyResults/{from}/to/{to}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Abulia\TflUnified\Swagger\Model\ItineraryResult', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Abulia\TflUnified\Swagger\Model\ItineraryResult', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 300:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Abulia\TflUnified\Swagger\Model\DisambiguationResult', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation journeyMeta
     *
     * Gets a list of all of the available journey planner modes
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Mode[]
     */
    public function journeyMeta()
    {
        list($response) = $this->journeyMetaWithHttpInfo();
        return $response;
    }

    /**
     * Operation journeyMetaWithHttpInfo
     *
     * Gets a list of all of the available journey planner modes
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return array of \Abulia\TflUnified\Swagger\Model\Mode[], HTTP status code, HTTP response headers (array of strings)
     */
    public function journeyMetaWithHttpInfo()
    {
        // parse inputs
        $resourcePath = "/Journey/Meta/Modes";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json', 'text/json', 'application/xml', 'text/xml']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('app_key');
        if (strlen($apiKey) !== 0) {
            $queryParams['app_key'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('app_id');
        if (strlen($apiKey) !== 0) {
            $queryParams['app_id'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Abulia\TflUnified\Swagger\Model\Mode[]',
                '/Journey/Meta/Modes'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Abulia\TflUnified\Swagger\Model\Mode[]', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Abulia\TflUnified\Swagger\Model\Mode[]', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
