<?php
/**
 * TimeAdjustments
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
 * TimeAdjustments Class Doc Comment
 *
 * @category    Class
 * @package     Abulia\TflUnified\Swagger
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class TimeAdjustments implements ArrayAccess, Jsonable
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'TimeAdjustments';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'earlier' => '\Abulia\TflUnified\Swagger\Model\TimeAdjustment',
        'earliest' => '\Abulia\TflUnified\Swagger\Model\TimeAdjustment',
        'later' => '\Abulia\TflUnified\Swagger\Model\TimeAdjustment',
        'latest' => '\Abulia\TflUnified\Swagger\Model\TimeAdjustment'
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
        'earlier' => 'earlier',
        'earliest' => 'earliest',
        'later' => 'later',
        'latest' => 'latest'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'earlier' => 'setEarlier',
        'earliest' => 'setEarliest',
        'later' => 'setLater',
        'latest' => 'setLatest'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'earlier' => 'getEarlier',
        'earliest' => 'getEarliest',
        'later' => 'getLater',
        'latest' => 'getLatest'
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
        $this->container['earlier'] = isset($data['earlier']) ? $data['earlier'] : null;
        $this->container['earliest'] = isset($data['earliest']) ? $data['earliest'] : null;
        $this->container['later'] = isset($data['later']) ? $data['later'] : null;
        $this->container['latest'] = isset($data['latest']) ? $data['latest'] : null;
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
     * Gets earlier
     * @return \Abulia\TflUnified\Swagger\Model\TimeAdjustment
     */
    public function getEarlier()
    {
        return $this->container['earlier'];
    }

    /**
     * Sets earlier
     * @param \Abulia\TflUnified\Swagger\Model\TimeAdjustment $earlier
     * @return $this
     */
    public function setEarlier($earlier)
    {
        $this->container['earlier'] = $earlier;

        return $this;
    }

    /**
     * Gets earliest
     * @return \Abulia\TflUnified\Swagger\Model\TimeAdjustment
     */
    public function getEarliest()
    {
        return $this->container['earliest'];
    }

    /**
     * Sets earliest
     * @param \Abulia\TflUnified\Swagger\Model\TimeAdjustment $earliest
     * @return $this
     */
    public function setEarliest($earliest)
    {
        $this->container['earliest'] = $earliest;

        return $this;
    }

    /**
     * Gets later
     * @return \Abulia\TflUnified\Swagger\Model\TimeAdjustment
     */
    public function getLater()
    {
        return $this->container['later'];
    }

    /**
     * Sets later
     * @param \Abulia\TflUnified\Swagger\Model\TimeAdjustment $later
     * @return $this
     */
    public function setLater($later)
    {
        $this->container['later'] = $later;

        return $this;
    }

    /**
     * Gets latest
     * @return \Abulia\TflUnified\Swagger\Model\TimeAdjustment
     */
    public function getLatest()
    {
        return $this->container['latest'];
    }

    /**
     * Sets latest
     * @param \Abulia\TflUnified\Swagger\Model\TimeAdjustment $latest
     * @return $this
     */
    public function setLatest($latest)
    {
        $this->container['latest'] = $latest;

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


