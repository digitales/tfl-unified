<?php
/**
 * Bay
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
 * Bay Class Doc Comment
 *
 * @category    Class
 * @package     Abulia\TflUnified\Swagger
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Bay implements ArrayAccess, Jsonable
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Bay';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'bay_count' => 'int',
        'bay_type' => 'string',
        'free' => 'int',
        'occupied' => 'int'
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
        'bay_count' => 'bayCount',
        'bay_type' => 'bayType',
        'free' => 'free',
        'occupied' => 'occupied'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'bay_count' => 'setBayCount',
        'bay_type' => 'setBayType',
        'free' => 'setFree',
        'occupied' => 'setOccupied'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'bay_count' => 'getBayCount',
        'bay_type' => 'getBayType',
        'free' => 'getFree',
        'occupied' => 'getOccupied'
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
        $this->container['bay_count'] = isset($data['bay_count']) ? $data['bay_count'] : null;
        $this->container['bay_type'] = isset($data['bay_type']) ? $data['bay_type'] : null;
        $this->container['free'] = isset($data['free']) ? $data['free'] : null;
        $this->container['occupied'] = isset($data['occupied']) ? $data['occupied'] : null;
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
     * Gets bay_count
     * @return int
     */
    public function getBayCount()
    {
        return $this->container['bay_count'];
    }

    /**
     * Sets bay_count
     * @param int $bay_count
     * @return $this
     */
    public function setBayCount($bay_count)
    {
        $this->container['bay_count'] = $bay_count;

        return $this;
    }

    /**
     * Gets bay_type
     * @return string
     */
    public function getBayType()
    {
        return $this->container['bay_type'];
    }

    /**
     * Sets bay_type
     * @param string $bay_type
     * @return $this
     */
    public function setBayType($bay_type)
    {
        $this->container['bay_type'] = $bay_type;

        return $this;
    }

    /**
     * Gets free
     * @return int
     */
    public function getFree()
    {
        return $this->container['free'];
    }

    /**
     * Sets free
     * @param int $free
     * @return $this
     */
    public function setFree($free)
    {
        $this->container['free'] = $free;

        return $this;
    }

    /**
     * Gets occupied
     * @return int
     */
    public function getOccupied()
    {
        return $this->container['occupied'];
    }

    /**
     * Sets occupied
     * @param int $occupied
     * @return $this
     */
    public function setOccupied($occupied)
    {
        $this->container['occupied'] = $occupied;

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

