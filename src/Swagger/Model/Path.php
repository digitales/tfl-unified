<?php
/**
 * Path
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
 * Path Class Doc Comment
 *
 * @category    Class
 * @package     Abulia\TflUnified\Swagger
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Path implements ArrayAccess, Jsonable
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Path';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'elevation' => '\Abulia\TflUnified\Swagger\Model\JpElevation[]',
        'line_string' => 'string',
        'stop_points' => '\Abulia\TflUnified\Swagger\Model\Identifier[]'
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
        'elevation' => 'elevation',
        'line_string' => 'lineString',
        'stop_points' => 'stopPoints'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'elevation' => 'setElevation',
        'line_string' => 'setLineString',
        'stop_points' => 'setStopPoints'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'elevation' => 'getElevation',
        'line_string' => 'getLineString',
        'stop_points' => 'getStopPoints'
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
        $this->container['elevation'] = isset($data['elevation']) ? $data['elevation'] : null;
        $this->container['line_string'] = isset($data['line_string']) ? $data['line_string'] : null;
        $this->container['stop_points'] = isset($data['stop_points']) ? $data['stop_points'] : null;
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
     * Gets elevation
     * @return \Abulia\TflUnified\Swagger\Model\JpElevation[]
     */
    public function getElevation()
    {
        return $this->container['elevation'];
    }

    /**
     * Sets elevation
     * @param \Abulia\TflUnified\Swagger\Model\JpElevation[] $elevation
     * @return $this
     */
    public function setElevation($elevation)
    {
        $this->container['elevation'] = $elevation;

        return $this;
    }

    /**
     * Gets line_string
     * @return string
     */
    public function getLineString()
    {
        return $this->container['line_string'];
    }

    /**
     * Sets line_string
     * @param string $line_string
     * @return $this
     */
    public function setLineString($line_string)
    {
        $this->container['line_string'] = $line_string;

        return $this;
    }

    /**
     * Gets stop_points
     * @return \Abulia\TflUnified\Swagger\Model\Identifier[]
     */
    public function getStopPoints()
    {
        return $this->container['stop_points'];
    }

    /**
     * Sets stop_points
     * @param \Abulia\TflUnified\Swagger\Model\Identifier[] $stop_points
     * @return $this
     */
    public function setStopPoints($stop_points)
    {
        $this->container['stop_points'] = $stop_points;

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


