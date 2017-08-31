<?php

namespace ProdaCom\FilterBundle\Exception;

/**
 * Class UnexpectedTypeException
 * @package ProdaCom\FilterBundle\Exception
 */
class UnexpectedTypeException extends \InvalidArgumentException {

    /**
     * UnexpectedTypeException constructor.
     * @param mixed $value
     * @param string $expectedType
     */
    public function __construct($value, $expectedType) {
        parent::__construct(sprintf('Expected argument of type "%s", "%s" given', $expectedType, is_object($value) ? get_class($value) : gettype($value)));
    }

}