<?php

namespace Abulia\TflUnified\Exceptions;

use Abulia\TflUnified\Swagger\ApiException;

/**
 * Class WrapperException
 * @package Abulia\TflUnified\Exceptions
 */
class WrapperException extends ApiException
{
    /**
     * @var ApiException
     */
    protected $originalException;

    /**
     * @var
     */
    protected $wrapperErrorCode;

    /**
     * @var
     */
    protected $wrapperErrorMessage;

    /**
     * WrapperException constructor.
     * @param string $message
     * @param int $code
     * @param null $responseHeaders
     * @param null $responseBody
     */
    public function __construct($message = "", $code = 0, $responseHeaders = null, $responseBody = null)
    {
        parent::__construct($message, $code, $responseHeaders, $responseBody);
    }

    /**
     * @param ApiException $e
     * @return mixed
     */
    public static function wrapException(ApiException $e)
    {
        $class = static::class;

        if (isset($e->getResponseBody()->exceptionType)) {
            $exceptionClass = __NAMESPACE__ . '\\' . preg_replace('/[^a-zA-Z0-9_]/', '', $e->getResponseBody()->exceptionType);
            if (class_exists($exceptionClass)) {
                $class = $exceptionClass;
            }
        }

        return $class::fromApiException($e);
    }

    /**
     * @param ApiException $e
     * @return static
     */
    public static function fromApiException(ApiException $e)
    {
        $newSelf = new static(
            $e->getMessage(),
            $e->getCode(),
            $e->getResponseHeaders(),
            $e->getResponseBody()
        );
        $newSelf->setOriginalException($e);
        return $newSelf;
    }

    /**
     * @return mixed
     */
    public function getOriginalException()
    {
        return $this->originalException;
    }

    /**
     * @param mixed $originalException
     */
    public function setOriginalException($originalException)
    {
        $this->originalException = $originalException;
    }

    /**
     * @return mixed
     */
    public function getWrapperErrorCode()
    {
        return $this->wrapperErrorCode;
    }

    /**
     * @param mixed $wrapperErrorCode
     */
    public function setWrapperErrorCode($wrapperErrorCode)
    {
        $this->wrapperErrorCode = $wrapperErrorCode;
    }

    /**
     * @return mixed
     */
    public function getWrapperErrorMessage()
    {
        return $this->wrapperErrorMessage;
    }

    /**
     * @param mixed $wrapperErrorMessage
     */
    public function setWrapperErrorMessage($wrapperErrorMessage)
    {
        $this->wrapperErrorMessage = $wrapperErrorMessage;
    }
}