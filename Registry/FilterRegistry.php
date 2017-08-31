<?php

namespace ProdaCom\FilterBundle\Registry;

use ProdaCom\FilterBundle\Exception\UnexpectedTypeException;
use ProdaCom\FilterBundle\Model\FilterInterface;

/**
 * Class FilterRegistry
 * @package ProdaCom\FilterBundle\Registry
 */
class FilterRegistry {

    /**
     * @var FilterInterface[]
     */
    private $types = [];

    /**
     * @param string $type
     * @return FilterInterface
     */
    public function get($type) {
        if (!is_string($type)) {
            throw new UnexpectedTypeException($type, 'string');
        }

        if (!isset($this->types[$type])) {
            if (!in_array(FilterInterface::class, class_implements($type))) {
                throw new \InvalidArgumentException(sprintf('Filter class "%s" should implement "%s".',  $type,FilterInterface::class));
            }

            $this->types[$type] = new $type();
        }

        return $this->types[$type];
    }

    /**
     * @param FilterInterface $type
     * @return void
     */
    public function addType(FilterInterface $type) {
        if (!isset($this->types[get_class($type)])) {
            $this->types[get_class($type)] = $type;
        }
    }

}