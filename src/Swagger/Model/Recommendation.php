<?php
/**
 * Recommendation
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
 * Recommendation Class Doc Comment
 *
 * @category    Class
 * @package     Abulia\TflUnified\Swagger
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Recommendation implements ArrayAccess, Jsonable
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Recommendation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cost' => 'string',
        'discount_card' => 'string',
        'fare_type' => 'string',
        'getting_your_ticket' => '\Abulia\TflUnified\Swagger\Model\Message[]',
        'id' => 'int',
        'key_features' => '\Abulia\TflUnified\Swagger\Model\Message[]',
        'notes' => '\Abulia\TflUnified\Swagger\Model\Message[]',
        'price_comparison' => 'string',
        'price_description' => 'string',
        'product' => 'string',
        'product_type' => 'string',
        'rank' => 'int',
        'recommended_top_up' => 'string',
        'rule' => 'int',
        'single_fare' => 'double',
        'ticket_time' => 'string',
        'ticket_type' => 'string',
        'zones' => 'string'
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
        'cost' => 'cost',
        'discount_card' => 'discountCard',
        'fare_type' => 'fareType',
        'getting_your_ticket' => 'gettingYourTicket',
        'id' => 'id',
        'key_features' => 'keyFeatures',
        'notes' => 'notes',
        'price_comparison' => 'priceComparison',
        'price_description' => 'priceDescription',
        'product' => 'product',
        'product_type' => 'productType',
        'rank' => 'rank',
        'recommended_top_up' => 'recommendedTopUp',
        'rule' => 'rule',
        'single_fare' => 'singleFare',
        'ticket_time' => 'ticketTime',
        'ticket_type' => 'ticketType',
        'zones' => 'zones'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'cost' => 'setCost',
        'discount_card' => 'setDiscountCard',
        'fare_type' => 'setFareType',
        'getting_your_ticket' => 'setGettingYourTicket',
        'id' => 'setId',
        'key_features' => 'setKeyFeatures',
        'notes' => 'setNotes',
        'price_comparison' => 'setPriceComparison',
        'price_description' => 'setPriceDescription',
        'product' => 'setProduct',
        'product_type' => 'setProductType',
        'rank' => 'setRank',
        'recommended_top_up' => 'setRecommendedTopUp',
        'rule' => 'setRule',
        'single_fare' => 'setSingleFare',
        'ticket_time' => 'setTicketTime',
        'ticket_type' => 'setTicketType',
        'zones' => 'setZones'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'cost' => 'getCost',
        'discount_card' => 'getDiscountCard',
        'fare_type' => 'getFareType',
        'getting_your_ticket' => 'getGettingYourTicket',
        'id' => 'getId',
        'key_features' => 'getKeyFeatures',
        'notes' => 'getNotes',
        'price_comparison' => 'getPriceComparison',
        'price_description' => 'getPriceDescription',
        'product' => 'getProduct',
        'product_type' => 'getProductType',
        'rank' => 'getRank',
        'recommended_top_up' => 'getRecommendedTopUp',
        'rule' => 'getRule',
        'single_fare' => 'getSingleFare',
        'ticket_time' => 'getTicketTime',
        'ticket_type' => 'getTicketType',
        'zones' => 'getZones'
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
        $this->container['cost'] = isset($data['cost']) ? $data['cost'] : null;
        $this->container['discount_card'] = isset($data['discount_card']) ? $data['discount_card'] : null;
        $this->container['fare_type'] = isset($data['fare_type']) ? $data['fare_type'] : null;
        $this->container['getting_your_ticket'] = isset($data['getting_your_ticket']) ? $data['getting_your_ticket'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['key_features'] = isset($data['key_features']) ? $data['key_features'] : null;
        $this->container['notes'] = isset($data['notes']) ? $data['notes'] : null;
        $this->container['price_comparison'] = isset($data['price_comparison']) ? $data['price_comparison'] : null;
        $this->container['price_description'] = isset($data['price_description']) ? $data['price_description'] : null;
        $this->container['product'] = isset($data['product']) ? $data['product'] : null;
        $this->container['product_type'] = isset($data['product_type']) ? $data['product_type'] : null;
        $this->container['rank'] = isset($data['rank']) ? $data['rank'] : null;
        $this->container['recommended_top_up'] = isset($data['recommended_top_up']) ? $data['recommended_top_up'] : null;
        $this->container['rule'] = isset($data['rule']) ? $data['rule'] : null;
        $this->container['single_fare'] = isset($data['single_fare']) ? $data['single_fare'] : null;
        $this->container['ticket_time'] = isset($data['ticket_time']) ? $data['ticket_time'] : null;
        $this->container['ticket_type'] = isset($data['ticket_type']) ? $data['ticket_type'] : null;
        $this->container['zones'] = isset($data['zones']) ? $data['zones'] : null;
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
     * Gets cost
     * @return string
     */
    public function getCost()
    {
        return $this->container['cost'];
    }

    /**
     * Sets cost
     * @param string $cost
     * @return $this
     */
    public function setCost($cost)
    {
        $this->container['cost'] = $cost;

        return $this;
    }

    /**
     * Gets discount_card
     * @return string
     */
    public function getDiscountCard()
    {
        return $this->container['discount_card'];
    }

    /**
     * Sets discount_card
     * @param string $discount_card
     * @return $this
     */
    public function setDiscountCard($discount_card)
    {
        $this->container['discount_card'] = $discount_card;

        return $this;
    }

    /**
     * Gets fare_type
     * @return string
     */
    public function getFareType()
    {
        return $this->container['fare_type'];
    }

    /**
     * Sets fare_type
     * @param string $fare_type
     * @return $this
     */
    public function setFareType($fare_type)
    {
        $this->container['fare_type'] = $fare_type;

        return $this;
    }

    /**
     * Gets getting_your_ticket
     * @return \Abulia\TflUnified\Swagger\Model\Message[]
     */
    public function getGettingYourTicket()
    {
        return $this->container['getting_your_ticket'];
    }

    /**
     * Sets getting_your_ticket
     * @param \Abulia\TflUnified\Swagger\Model\Message[] $getting_your_ticket
     * @return $this
     */
    public function setGettingYourTicket($getting_your_ticket)
    {
        $this->container['getting_your_ticket'] = $getting_your_ticket;

        return $this;
    }

    /**
     * Gets id
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets key_features
     * @return \Abulia\TflUnified\Swagger\Model\Message[]
     */
    public function getKeyFeatures()
    {
        return $this->container['key_features'];
    }

    /**
     * Sets key_features
     * @param \Abulia\TflUnified\Swagger\Model\Message[] $key_features
     * @return $this
     */
    public function setKeyFeatures($key_features)
    {
        $this->container['key_features'] = $key_features;

        return $this;
    }

    /**
     * Gets notes
     * @return \Abulia\TflUnified\Swagger\Model\Message[]
     */
    public function getNotes()
    {
        return $this->container['notes'];
    }

    /**
     * Sets notes
     * @param \Abulia\TflUnified\Swagger\Model\Message[] $notes
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->container['notes'] = $notes;

        return $this;
    }

    /**
     * Gets price_comparison
     * @return string
     */
    public function getPriceComparison()
    {
        return $this->container['price_comparison'];
    }

    /**
     * Sets price_comparison
     * @param string $price_comparison
     * @return $this
     */
    public function setPriceComparison($price_comparison)
    {
        $this->container['price_comparison'] = $price_comparison;

        return $this;
    }

    /**
     * Gets price_description
     * @return string
     */
    public function getPriceDescription()
    {
        return $this->container['price_description'];
    }

    /**
     * Sets price_description
     * @param string $price_description
     * @return $this
     */
    public function setPriceDescription($price_description)
    {
        $this->container['price_description'] = $price_description;

        return $this;
    }

    /**
     * Gets product
     * @return string
     */
    public function getProduct()
    {
        return $this->container['product'];
    }

    /**
     * Sets product
     * @param string $product
     * @return $this
     */
    public function setProduct($product)
    {
        $this->container['product'] = $product;

        return $this;
    }

    /**
     * Gets product_type
     * @return string
     */
    public function getProductType()
    {
        return $this->container['product_type'];
    }

    /**
     * Sets product_type
     * @param string $product_type
     * @return $this
     */
    public function setProductType($product_type)
    {
        $this->container['product_type'] = $product_type;

        return $this;
    }

    /**
     * Gets rank
     * @return int
     */
    public function getRank()
    {
        return $this->container['rank'];
    }

    /**
     * Sets rank
     * @param int $rank
     * @return $this
     */
    public function setRank($rank)
    {
        $this->container['rank'] = $rank;

        return $this;
    }

    /**
     * Gets recommended_top_up
     * @return string
     */
    public function getRecommendedTopUp()
    {
        return $this->container['recommended_top_up'];
    }

    /**
     * Sets recommended_top_up
     * @param string $recommended_top_up
     * @return $this
     */
    public function setRecommendedTopUp($recommended_top_up)
    {
        $this->container['recommended_top_up'] = $recommended_top_up;

        return $this;
    }

    /**
     * Gets rule
     * @return int
     */
    public function getRule()
    {
        return $this->container['rule'];
    }

    /**
     * Sets rule
     * @param int $rule
     * @return $this
     */
    public function setRule($rule)
    {
        $this->container['rule'] = $rule;

        return $this;
    }

    /**
     * Gets single_fare
     * @return double
     */
    public function getSingleFare()
    {
        return $this->container['single_fare'];
    }

    /**
     * Sets single_fare
     * @param double $single_fare
     * @return $this
     */
    public function setSingleFare($single_fare)
    {
        $this->container['single_fare'] = $single_fare;

        return $this;
    }

    /**
     * Gets ticket_time
     * @return string
     */
    public function getTicketTime()
    {
        return $this->container['ticket_time'];
    }

    /**
     * Sets ticket_time
     * @param string $ticket_time
     * @return $this
     */
    public function setTicketTime($ticket_time)
    {
        $this->container['ticket_time'] = $ticket_time;

        return $this;
    }

    /**
     * Gets ticket_type
     * @return string
     */
    public function getTicketType()
    {
        return $this->container['ticket_type'];
    }

    /**
     * Sets ticket_type
     * @param string $ticket_type
     * @return $this
     */
    public function setTicketType($ticket_type)
    {
        $this->container['ticket_type'] = $ticket_type;

        return $this;
    }

    /**
     * Gets zones
     * @return string
     */
    public function getZones()
    {
        return $this->container['zones'];
    }

    /**
     * Sets zones
     * @param string $zones
     * @return $this
     */
    public function setZones($zones)
    {
        $this->container['zones'] = $zones;

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

