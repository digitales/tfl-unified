<?php
/**
 * Mode
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
 * Mode Class Doc Comment
 *
 * @category    Class
 * @package     Abulia\TflUnified\Swagger
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Mode implements ArrayAccess, Jsonable
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Mode';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'is_fare_paying' => 'bool',
        'is_scheduled_service' => 'bool',
        'is_tfl_service' => 'bool',
        'mode_name' => 'string'
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
        'is_fare_paying' => 'isFarePaying',
        'is_scheduled_service' => 'isScheduledService',
        'is_tfl_service' => 'isTflService',
        'mode_name' => 'modeName'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'is_fare_paying' => 'setIsFarePaying',
        'is_scheduled_service' => 'setIsScheduledService',
        'is_tfl_service' => 'setIsTflService',
        'mode_name' => 'setModeName'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'is_fare_paying' => 'getIsFarePaying',
        'is_scheduled_service' => 'getIsScheduledService',
        'is_tfl_service' => 'getIsTflService',
        'mode_name' => 'getModeName'
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
        $this->container['is_fare_paying'] = isset($data['is_fare_paying']) ? $data['is_fare_paying'] : null;
        $this->container['is_scheduled_service'] = isset($data['is_scheduled_service']) ? $data['is_scheduled_service'] : null;
        $this->container['is_tfl_service'] = isset($data['is_tfl_service']) ? $data['is_tfl_service'] : null;
        $this->container['mode_name'] = isset($data['mode_name']) ? $data['mode_name'] : null;
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
     * Gets is_fare_paying
     * @return bool
     */
    public function getIsFarePaying()
    {
        return $this->container['is_fare_paying'];
    }

    /**
     * Sets is_fare_paying
     * @param bool $is_fare_paying
     * @return $this
     */
    public function setIsFarePaying($is_fare_paying)
    {
        $this->container['is_fare_paying'] = $is_fare_paying;

        return $this;
    }

    /**
     * Gets is_scheduled_service
     * @return bool
     */
    public function getIsScheduledService()
    {
        return $this->container['is_scheduled_service'];
    }

    /**
     * Sets is_scheduled_service
     * @param bool $is_scheduled_service
     * @return $this
     */
    public function setIsScheduledService($is_scheduled_service)
    {
        $this->container['is_scheduled_service'] = $is_scheduled_service;

        return $this;
    }

    /**
     * Gets is_tfl_service
     * @return bool
     */
    public function getIsTflService()
    {
        return $this->container['is_tfl_service'];
    }

    /**
     * Sets is_tfl_service
     * @param bool $is_tfl_service
     * @return $this
     */
    public function setIsTflService($is_tfl_service)
    {
        $this->container['is_tfl_service'] = $is_tfl_service;

        return $this;
    }

    /**
     * Gets mode_name
     * @return string
     */
    public function getModeName()
    {
        return $this->container['mode_name'];
    }

    /**
     * Sets mode_name
     * @param string $mode_name
     * @return $this
     */
    public function setModeName($mode_name)
    {
        $this->container['mode_name'] = $mode_name;

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


