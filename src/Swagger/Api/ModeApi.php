<?php
/**
 * ModeApi
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
 * ModeApi Class Doc Comment
 *
 * @category Class
 * @package  Abulia\TflUnified\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ModeApi
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
     * @return ModeApi
     */
    public function setApiClient(\Abulia\TflUnified\Swagger\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation modeArrivals
     *
     * Gets the next arrival predictions for all stops of a given mode
     *
     * @param string $mode A mode name e.g. tube, dlr (required)
     * @param int $count A number of arrivals to return for each stop, -1 to return all available. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\Prediction[]
     */
    public function modeArrivals($mode, $count = null)
    {
        list($response) = $this->modeArrivalsWithHttpInfo($mode, $count);
        return $response;
    }

    /**
     * Operation modeArrivalsWithHttpInfo
     *
     * Gets the next arrival predictions for all stops of a given mode
     *
     * @param string $mode A mode name e.g. tube, dlr (required)
     * @param int $count A number of arrivals to return for each stop, -1 to return all available. (optional)
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return array of \Abulia\TflUnified\Swagger\Model\Prediction[], HTTP status code, HTTP response headers (array of strings)
     */
    public function modeArrivalsWithHttpInfo($mode, $count = null)
    {
        // verify the required parameter 'mode' is set
        if ($mode === null) {
            throw new \InvalidArgumentException('Missing the required parameter $mode when calling modeArrivals');
        }
        // parse inputs
        $resourcePath = "/Mode/{mode}/Arrivals";
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
        if ($count !== null) {
            $queryParams['count'] = $this->apiClient->getSerializer()->toQueryValue($count);
        }
        // path params
        if ($mode !== null) {
            $resourcePath = str_replace(
                "{" . "mode" . "}",
                $this->apiClient->getSerializer()->toPathValue($mode),
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
                '\Abulia\TflUnified\Swagger\Model\Prediction[]',
                '/Mode/{mode}/Arrivals'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Abulia\TflUnified\Swagger\Model\Prediction[]', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Abulia\TflUnified\Swagger\Model\Prediction[]', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation modeGetActiveServiceTypes
     *
     * Returns the service type active for a mode.              Currently only supports tube
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return \Abulia\TflUnified\Swagger\Model\ActiveServiceType[]
     */
    public function modeGetActiveServiceTypes()
    {
        list($response) = $this->modeGetActiveServiceTypesWithHttpInfo();
        return $response;
    }

    /**
     * Operation modeGetActiveServiceTypesWithHttpInfo
     *
     * Returns the service type active for a mode.              Currently only supports tube
     *
     * @throws \Abulia\TflUnified\Swagger\ApiException on non-2xx response
     * @return array of \Abulia\TflUnified\Swagger\Model\ActiveServiceType[], HTTP status code, HTTP response headers (array of strings)
     */
    public function modeGetActiveServiceTypesWithHttpInfo()
    {
        // parse inputs
        $resourcePath = "/Mode/ActiveServiceTypes";
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
                '\Abulia\TflUnified\Swagger\Model\ActiveServiceType[]',
                '/Mode/ActiveServiceTypes'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Abulia\TflUnified\Swagger\Model\ActiveServiceType[]', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Abulia\TflUnified\Swagger\Model\ActiveServiceType[]', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
