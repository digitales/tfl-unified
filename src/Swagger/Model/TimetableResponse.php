<?php
/**
 * TimetableResponse
 *
 * PHP version 5
 *
 * @category Class
 * @package  Abulia\TflUnified\Swagger
 * @author   Swaagger Codegen team
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

namespace Abulia\TflUnified\Swagger\Model;

use \ArrayAccess;
use Illuminate\Contracts\Support\Jsonable;

/**
 * TimetableResponse Class Doc Comment
 *
 * @category    Class
 * @package     Abulia\TflUnified\Swagger
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class TimetableResponse implements ArrayAccess, Jsonable
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'TimetableResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'direction' => 'string',
        'disambiguation' => '\Abulia\TflUnified\Swagger\Model\Disambiguation',
        'line_id' => 'string',
        'line_name' => 'string',
        'pdf_url' => 'string',
        'stations' => '\Abulia\TflUnified\Swagger\Model\MatchedStop[]',
        'status_error_message' => 'string',
        'stops' => '\Abulia\TflUnified\Swagger\Model\MatchedStop[]',
        'timetable' => '\Abulia\TflUnified\Swagger\Model\Timetable'
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'direction' => 'direction',
        'disambiguation' => 'disambiguation',
        'line_id' => 'lineId',
        'line_name' => 'lineName',
        'pdf_url' => 'pdfUrl',
        'stations' => 'stations',
        'status_error_message' => 'statusErrorMessage',
        'stops' => 'stops',
        'timetable' => 'timetable'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'direction' => 'setDirection',
        'disambiguation' => 'setDisambiguation',
        'line_id' => 'setLineId',
        'line_name' => 'setLineName',
        'pdf_url' => 'setPdfUrl',
        'stations' => 'setStations',
        'status_error_message' => 'setStatusErrorMessage',
        'stops' => 'setStops',
        'timetable' => 'setTimetable'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'direction' => 'getDirection',
        'disambiguation' => 'getDisambiguation',
        'line_id' => 'getLineId',
        'line_name' => 'getLineName',
        'pdf_url' => 'getPdfUrl',
        'stations' => 'getStations',
        'status_error_message' => 'getStatusErrorMessage',
        'stops' => 'getStops',
        'timetable' => 'getTimetable'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['direction'] = isset($data['direction']) ? $data['direction'] : null;
        $this->container['disambiguation'] = isset($data['disambiguation']) ? $data['disambiguation'] : null;
        $this->container['line_id'] = isset($data['line_id']) ? $data['line_id'] : null;
        $this->container['line_name'] = isset($data['line_name']) ? $data['line_name'] : null;
        $this->container['pdf_url'] = isset($data['pdf_url']) ? $data['pdf_url'] : null;
        $this->container['stations'] = isset($data['stations']) ? $data['stations'] : null;
        $this->container['status_error_message'] = isset($data['status_error_message']) ? $data['status_error_message'] : null;
        $this->container['stops'] = isset($data['stops']) ? $data['stops'] : null;
        $this->container['timetable'] = isset($data['timetable']) ? $data['timetable'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets direction
     * @return string
     */
    public function getDirection()
    {
        return $this->container['direction'];
    }

    /**
     * Sets direction
     * @param string $direction
     * @return $this
     */
    public function setDirection($direction)
    {
        $this->container['direction'] = $direction;

        return $this;
    }

    /**
     * Gets disambiguation
     * @return \Abulia\TflUnified\Swagger\Model\Disambiguation
     */
    public function getDisambiguation()
    {
        return $this->container['disambiguation'];
    }

    /**
     * Sets disambiguation
     * @param \Abulia\TflUnified\Swagger\Model\Disambiguation $disambiguation
     * @return $this
     */
    public function setDisambiguation($disambiguation)
    {
        $this->container['disambiguation'] = $disambiguation;

        return $this;
    }

    /**
     * Gets line_id
     * @return string
     */
    public function getLineId()
    {
        return $this->container['line_id'];
    }

    /**
     * Sets line_id
     * @param string $line_id
     * @return $this
     */
    public function setLineId($line_id)
    {
        $this->container['line_id'] = $line_id;

        return $this;
    }

    /**
     * Gets line_name
     * @return string
     */
    public function getLineName()
    {
        return $this->container['line_name'];
    }

    /**
     * Sets line_name
     * @param string $line_name
     * @return $this
     */
    public function setLineName($line_name)
    {
        $this->container['line_name'] = $line_name;

        return $this;
    }

    /**
     * Gets pdf_url
     * @return string
     */
    public function getPdfUrl()
    {
        return $this->container['pdf_url'];
    }

    /**
     * Sets pdf_url
     * @param string $pdf_url
     * @return $this
     */
    public function setPdfUrl($pdf_url)
    {
        $this->container['pdf_url'] = $pdf_url;

        return $this;
    }

    /**
     * Gets stations
     * @return \Abulia\TflUnified\Swagger\Model\MatchedStop[]
     */
    public function getStations()
    {
        return $this->container['stations'];
    }

    /**
     * Sets stations
     * @param \Abulia\TflUnified\Swagger\Model\MatchedStop[] $stations
     * @return $this
     */
    public function setStations($stations)
    {
        $this->container['stations'] = $stations;

        return $this;
    }

    /**
     * Gets status_error_message
     * @return string
     */
    public function getStatusErrorMessage()
    {
        return $this->container['status_error_message'];
    }

    /**
     * Sets status_error_message
     * @param string $status_error_message
     * @return $this
     */
    public function setStatusErrorMessage($status_error_message)
    {
        $this->container['status_error_message'] = $status_error_message;

        return $this;
    }

    /**
     * Gets stops
     * @return \Abulia\TflUnified\Swagger\Model\MatchedStop[]
     */
    public function getStops()
    {
        return $this->container['stops'];
    }

    /**
     * Sets stops
     * @param \Abulia\TflUnified\Swagger\Model\MatchedStop[] $stops
     * @return $this
     */
    public function setStops($stops)
    {
        $this->container['stops'] = $stops;

        return $this;
    }

    /**
     * Gets timetable
     * @return \Abulia\TflUnified\Swagger\Model\Timetable
     */
    public function getTimetable()
    {
        return $this->container['timetable'];
    }

    /**
     * Sets timetable
     * @param \Abulia\TflUnified\Swagger\Model\Timetable $timetable
     * @return $this
     */
    public function setTimetable($timetable)
    {
        $this->container['timetable'] = $timetable;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Abulia\TflUnified\Swagger\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Abulia\TflUnified\Swagger\ObjectSerializer::sanitizeForSerialization($this));
    }

    /**
     * To allow implict conversion to JSON by Laravel.
     */
    public function toJson($options = 0)
    {
        return $this->__toString();
    }

    /**
     * For convenient property based access.
     */
    public function __get($name)
    {
        if (isset(static::$getters[$name])) {
            return $this->{static::$getters[$name]}();
        }
        return null;
    }
}


