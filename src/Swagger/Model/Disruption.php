<?php
/**
 * Disruption
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
 * Disruption Class Doc Comment
 *
 * @category    Class
 * @description Represents a disruption to a route within the transport network.
 * @package     Abulia\TflUnified\Swagger
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Disruption implements ArrayAccess, Jsonable
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Disruption';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'additional_info' => 'string',
        'affected_routes' => '\Abulia\TflUnified\Swagger\Model\RouteSection[]',
        'affected_stops' => '\Abulia\TflUnified\Swagger\Model\StopPoint[]',
        'category' => 'string',
        'category_description' => 'string',
        'closure_text' => 'string',
        'created' => '\DateTime',
        'description' => 'string',
        'is_blocking' => 'bool',
        'is_whole_line' => 'bool',
        'last_update' => '\DateTime',
        'type' => 'string'
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
        'additional_info' => 'additionalInfo',
        'affected_routes' => 'affectedRoutes',
        'affected_stops' => 'affectedStops',
        'category' => 'category',
        'category_description' => 'categoryDescription',
        'closure_text' => 'closureText',
        'created' => 'created',
        'description' => 'description',
        'is_blocking' => 'isBlocking',
        'is_whole_line' => 'isWholeLine',
        'last_update' => 'lastUpdate',
        'type' => 'type'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'additional_info' => 'setAdditionalInfo',
        'affected_routes' => 'setAffectedRoutes',
        'affected_stops' => 'setAffectedStops',
        'category' => 'setCategory',
        'category_description' => 'setCategoryDescription',
        'closure_text' => 'setClosureText',
        'created' => 'setCreated',
        'description' => 'setDescription',
        'is_blocking' => 'setIsBlocking',
        'is_whole_line' => 'setIsWholeLine',
        'last_update' => 'setLastUpdate',
        'type' => 'setType'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'additional_info' => 'getAdditionalInfo',
        'affected_routes' => 'getAffectedRoutes',
        'affected_stops' => 'getAffectedStops',
        'category' => 'getCategory',
        'category_description' => 'getCategoryDescription',
        'closure_text' => 'getClosureText',
        'created' => 'getCreated',
        'description' => 'getDescription',
        'is_blocking' => 'getIsBlocking',
        'is_whole_line' => 'getIsWholeLine',
        'last_update' => 'getLastUpdate',
        'type' => 'getType'
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

    const CATEGORY_UNDEFINED = 'Undefined';
    const CATEGORY_REAL_TIME = 'RealTime';
    const CATEGORY_PLANNED_WORK = 'PlannedWork';
    const CATEGORY_INFORMATION = 'Information';
    const CATEGORY_EVENT = 'Event';
    const CATEGORY_CROWDING = 'Crowding';
    const CATEGORY_STATUS_ALERT = 'StatusAlert';
    

    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getCategoryAllowableValues()
    {
        return [
            self::CATEGORY_UNDEFINED,
            self::CATEGORY_REAL_TIME,
            self::CATEGORY_PLANNED_WORK,
            self::CATEGORY_INFORMATION,
            self::CATEGORY_EVENT,
            self::CATEGORY_CROWDING,
            self::CATEGORY_STATUS_ALERT,
        ];
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
        $this->container['additional_info'] = isset($data['additional_info']) ? $data['additional_info'] : null;
        $this->container['affected_routes'] = isset($data['affected_routes']) ? $data['affected_routes'] : null;
        $this->container['affected_stops'] = isset($data['affected_stops']) ? $data['affected_stops'] : null;
        $this->container['category'] = isset($data['category']) ? $data['category'] : null;
        $this->container['category_description'] = isset($data['category_description']) ? $data['category_description'] : null;
        $this->container['closure_text'] = isset($data['closure_text']) ? $data['closure_text'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['is_blocking'] = isset($data['is_blocking']) ? $data['is_blocking'] : null;
        $this->container['is_whole_line'] = isset($data['is_whole_line']) ? $data['is_whole_line'] : null;
        $this->container['last_update'] = isset($data['last_update']) ? $data['last_update'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        $allowed_values = ["Undefined", "RealTime", "PlannedWork", "Information", "Event", "Crowding", "StatusAlert"];
        if (!in_array($this->container['category'], $allowed_values)) {
            $invalid_properties[] = "invalid value for 'category', must be one of 'Undefined', 'RealTime', 'PlannedWork', 'Information', 'Event', 'Crowding', 'StatusAlert'.";
        }

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

        $allowed_values = ["Undefined", "RealTime", "PlannedWork", "Information", "Event", "Crowding", "StatusAlert"];
        if (!in_array($this->container['category'], $allowed_values)) {
            return false;
        }
        return true;
    }


    /**
     * Gets additional_info
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->container['additional_info'];
    }

    /**
     * Sets additional_info
     * @param string $additional_info Gets or sets the additionaInfo of this disruption.
     * @return $this
     */
    public function setAdditionalInfo($additional_info)
    {
        $this->container['additional_info'] = $additional_info;

        return $this;
    }

    /**
     * Gets affected_routes
     * @return \Abulia\TflUnified\Swagger\Model\RouteSection[]
     */
    public function getAffectedRoutes()
    {
        return $this->container['affected_routes'];
    }

    /**
     * Sets affected_routes
     * @param \Abulia\TflUnified\Swagger\Model\RouteSection[] $affected_routes Gets or sets the routes affected by this disruption
     * @return $this
     */
    public function setAffectedRoutes($affected_routes)
    {
        $this->container['affected_routes'] = $affected_routes;

        return $this;
    }

    /**
     * Gets affected_stops
     * @return \Abulia\TflUnified\Swagger\Model\StopPoint[]
     */
    public function getAffectedStops()
    {
        return $this->container['affected_stops'];
    }

    /**
     * Sets affected_stops
     * @param \Abulia\TflUnified\Swagger\Model\StopPoint[] $affected_stops Gets or sets the stops affected by this disruption
     * @return $this
     */
    public function setAffectedStops($affected_stops)
    {
        $this->container['affected_stops'] = $affected_stops;

        return $this;
    }

    /**
     * Gets category
     * @return string
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     * @param string $category Gets or sets the category of this dispruption.
     * @return $this
     */
    public function setCategory($category)
    {
        $allowed_values = array('Undefined', 'RealTime', 'PlannedWork', 'Information', 'Event', 'Crowding', 'StatusAlert');
        if (!is_null($category) && (!in_array($category, $allowed_values))) {
            throw new \InvalidArgumentException("Invalid value for 'category', must be one of 'Undefined', 'RealTime', 'PlannedWork', 'Information', 'Event', 'Crowding', 'StatusAlert'");
        }
        $this->container['category'] = $category;

        return $this;
    }

    /**
     * Gets category_description
     * @return string
     */
    public function getCategoryDescription()
    {
        return $this->container['category_description'];
    }

    /**
     * Sets category_description
     * @param string $category_description Gets or sets the description of the category.
     * @return $this
     */
    public function setCategoryDescription($category_description)
    {
        $this->container['category_description'] = $category_description;

        return $this;
    }

    /**
     * Gets closure_text
     * @return string
     */
    public function getClosureText()
    {
        return $this->container['closure_text'];
    }

    /**
     * Sets closure_text
     * @param string $closure_text
     * @return $this
     */
    public function setClosureText($closure_text)
    {
        $this->container['closure_text'] = $closure_text;

        return $this;
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
     * @param \DateTime $created Gets or sets the date/time when this disruption was created.
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets description
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     * @param string $description Gets or sets the description of this disruption.
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets is_blocking
     * @return bool
     */
    public function getIsBlocking()
    {
        return $this->container['is_blocking'];
    }

    /**
     * Sets is_blocking
     * @param bool $is_blocking
     * @return $this
     */
    public function setIsBlocking($is_blocking)
    {
        $this->container['is_blocking'] = $is_blocking;

        return $this;
    }

    /**
     * Gets is_whole_line
     * @return bool
     */
    public function getIsWholeLine()
    {
        return $this->container['is_whole_line'];
    }

    /**
     * Sets is_whole_line
     * @param bool $is_whole_line
     * @return $this
     */
    public function setIsWholeLine($is_whole_line)
    {
        $this->container['is_whole_line'] = $is_whole_line;

        return $this;
    }

    /**
     * Gets last_update
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->container['last_update'];
    }

    /**
     * Sets last_update
     * @param \DateTime $last_update Gets or sets the date/time when this disruption was last updated.
     * @return $this
     */
    public function setLastUpdate($last_update)
    {
        $this->container['last_update'] = $last_update;

        return $this;
    }

    /**
     * Gets type
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     * @param string $type Gets or sets the disruption type of this dispruption.
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

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


