<?php
/**
 * Schedule
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
 * Schedule Class Doc Comment
 *
 * @category    Class
 * @package     Abulia\TflUnified\Swagger
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Schedule implements ArrayAccess, Jsonable
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Schedule';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'first_journey' => '\Abulia\TflUnified\Swagger\Model\KnownJourney',
        'known_journeys' => '\Abulia\TflUnified\Swagger\Model\KnownJourney[]',
        'last_journey' => '\Abulia\TflUnified\Swagger\Model\KnownJourney',
        'name' => 'string',
        'periods' => '\Abulia\TflUnified\Swagger\Model\Period[]'
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
        'first_journey' => 'firstJourney',
        'known_journeys' => 'knownJourneys',
        'last_journey' => 'lastJourney',
        'name' => 'name',
        'periods' => 'periods'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'first_journey' => 'setFirstJourney',
        'known_journeys' => 'setKnownJourneys',
        'last_journey' => 'setLastJourney',
        'name' => 'setName',
        'periods' => 'setPeriods'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'first_journey' => 'getFirstJourney',
        'known_journeys' => 'getKnownJourneys',
        'last_journey' => 'getLastJourney',
        'name' => 'getName',
        'periods' => 'getPeriods'
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
        $this->container['first_journey'] = isset($data['first_journey']) ? $data['first_journey'] : null;
        $this->container['known_journeys'] = isset($data['known_journeys']) ? $data['known_journeys'] : null;
        $this->container['last_journey'] = isset($data['last_journey']) ? $data['last_journey'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['periods'] = isset($data['periods']) ? $data['periods'] : null;
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
     * Gets first_journey
     * @return \Abulia\TflUnified\Swagger\Model\KnownJourney
     */
    public function getFirstJourney()
    {
        return $this->container['first_journey'];
    }

    /**
     * Sets first_journey
     * @param \Abulia\TflUnified\Swagger\Model\KnownJourney $first_journey
     * @return $this
     */
    public function setFirstJourney($first_journey)
    {
        $this->container['first_journey'] = $first_journey;

        return $this;
    }

    /**
     * Gets known_journeys
     * @return \Abulia\TflUnified\Swagger\Model\KnownJourney[]
     */
    public function getKnownJourneys()
    {
        return $this->container['known_journeys'];
    }

    /**
     * Sets known_journeys
     * @param \Abulia\TflUnified\Swagger\Model\KnownJourney[] $known_journeys
     * @return $this
     */
    public function setKnownJourneys($known_journeys)
    {
        $this->container['known_journeys'] = $known_journeys;

        return $this;
    }

    /**
     * Gets last_journey
     * @return \Abulia\TflUnified\Swagger\Model\KnownJourney
     */
    public function getLastJourney()
    {
        return $this->container['last_journey'];
    }

    /**
     * Sets last_journey
     * @param \Abulia\TflUnified\Swagger\Model\KnownJourney $last_journey
     * @return $this
     */
    public function setLastJourney($last_journey)
    {
        $this->container['last_journey'] = $last_journey;

        return $this;
    }

    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets periods
     * @return \Abulia\TflUnified\Swagger\Model\Period[]
     */
    public function getPeriods()
    {
        return $this->container['periods'];
    }

    /**
     * Sets periods
     * @param \Abulia\TflUnified\Swagger\Model\Period[] $periods
     * @return $this
     */
    public function setPeriods($periods)
    {
        $this->container['periods'] = $periods;

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


