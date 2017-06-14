<?php
/**
 * Line
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
 * Line Class Doc Comment
 *
 * @category    Class
 * @package     Abulia\TflUnified\Swagger
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Line implements ArrayAccess, Jsonable
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Line';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'created' => '\DateTime',
        'crowding' => '\Abulia\TflUnified\Swagger\Model\Crowding',
        'disruptions' => '\Abulia\TflUnified\Swagger\Model\Disruption[]',
        'id' => 'string',
        'line_statuses' => '\Abulia\TflUnified\Swagger\Model\LineStatus[]',
        'mode_name' => 'string',
        'modified' => '\DateTime',
        'name' => 'string',
        'route_sections' => '\Abulia\TflUnified\Swagger\Model\MatchedRoute[]',
        'service_types' => '\Abulia\TflUnified\Swagger\Model\LineServiceTypeInfo[]'
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
        'created' => 'created',
        'crowding' => 'crowding',
        'disruptions' => 'disruptions',
        'id' => 'id',
        'line_statuses' => 'lineStatuses',
        'mode_name' => 'modeName',
        'modified' => 'modified',
        'name' => 'name',
        'route_sections' => 'routeSections',
        'service_types' => 'serviceTypes'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'created' => 'setCreated',
        'crowding' => 'setCrowding',
        'disruptions' => 'setDisruptions',
        'id' => 'setId',
        'line_statuses' => 'setLineStatuses',
        'mode_name' => 'setModeName',
        'modified' => 'setModified',
        'name' => 'setName',
        'route_sections' => 'setRouteSections',
        'service_types' => 'setServiceTypes'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'created' => 'getCreated',
        'crowding' => 'getCrowding',
        'disruptions' => 'getDisruptions',
        'id' => 'getId',
        'line_statuses' => 'getLineStatuses',
        'mode_name' => 'getModeName',
        'modified' => 'getModified',
        'name' => 'getName',
        'route_sections' => 'getRouteSections',
        'service_types' => 'getServiceTypes'
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
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['crowding'] = isset($data['crowding']) ? $data['crowding'] : null;
        $this->container['disruptions'] = isset($data['disruptions']) ? $data['disruptions'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['line_statuses'] = isset($data['line_statuses']) ? $data['line_statuses'] : null;
        $this->container['mode_name'] = isset($data['mode_name']) ? $data['mode_name'] : null;
        $this->container['modified'] = isset($data['modified']) ? $data['modified'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['route_sections'] = isset($data['route_sections']) ? $data['route_sections'] : null;
        $this->container['service_types'] = isset($data['service_types']) ? $data['service_types'] : null;
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
     * Gets created
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     * @param \DateTime $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets crowding
     * @return \Abulia\TflUnified\Swagger\Model\Crowding
     */
    public function getCrowding()
    {
        return $this->container['crowding'];
    }

    /**
     * Sets crowding
     * @param \Abulia\TflUnified\Swagger\Model\Crowding $crowding
     * @return $this
     */
    public function setCrowding($crowding)
    {
        $this->container['crowding'] = $crowding;

        return $this;
    }

    /**
     * Gets disruptions
     * @return \Abulia\TflUnified\Swagger\Model\Disruption[]
     */
    public function getDisruptions()
    {
        return $this->container['disruptions'];
    }

    /**
     * Sets disruptions
     * @param \Abulia\TflUnified\Swagger\Model\Disruption[] $disruptions
     * @return $this
     */
    public function setDisruptions($disruptions)
    {
        $this->container['disruptions'] = $disruptions;

        return $this;
    }

    /**
     * Gets id
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets line_statuses
     * @return \Abulia\TflUnified\Swagger\Model\LineStatus[]
     */
    public function getLineStatuses()
    {
        return $this->container['line_statuses'];
    }

    /**
     * Sets line_statuses
     * @param \Abulia\TflUnified\Swagger\Model\LineStatus[] $line_statuses
     * @return $this
     */
    public function setLineStatuses($line_statuses)
    {
        $this->container['line_statuses'] = $line_statuses;

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
     * Gets modified
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->container['modified'];
    }

    /**
     * Sets modified
     * @param \DateTime $modified
     * @return $this
     */
    public function setModified($modified)
    {
        $this->container['modified'] = $modified;

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
     * Gets route_sections
     * @return \Abulia\TflUnified\Swagger\Model\MatchedRoute[]
     */
    public function getRouteSections()
    {
        return $this->container['route_sections'];
    }

    /**
     * Sets route_sections
     * @param \Abulia\TflUnified\Swagger\Model\MatchedRoute[] $route_sections
     * @return $this
     */
    public function setRouteSections($route_sections)
    {
        $this->container['route_sections'] = $route_sections;

        return $this;
    }

    /**
     * Gets service_types
     * @return \Abulia\TflUnified\Swagger\Model\LineServiceTypeInfo[]
     */
    public function getServiceTypes()
    {
        return $this->container['service_types'];
    }

    /**
     * Sets service_types
     * @param \Abulia\TflUnified\Swagger\Model\LineServiceTypeInfo[] $service_types
     * @return $this
     */
    public function setServiceTypes($service_types)
    {
        $this->container['service_types'] = $service_types;

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

