<?php

namespace ProdaCom\FilterBundle\Configuration;

/**
 * Class FieldMapping
 * @package ProdaCom\FilterBundle\Configuration
 */
class FieldMapping {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $comparisonClass;

    /**
     * @var string
     */
    private $alias;

    /**
     * FieldMapping constructor.
     * @param string $name
     * @param string $comparisonClass
     * @param string $alias
     */
    public function __construct($name, $comparisonClass, $alias) {
        $this->name = $name;
        $this->comparisonClass = $comparisonClass;
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return FieldMapping
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getComparisonClass() {
        return $this->comparisonClass;
    }

    /**
     * @param string $comparisonClass
     * @return FieldMapping
     */
    public function setComparisonClass($comparisonClass) {
        $this->comparisonClass = $comparisonClass;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlias() {
        return $this->alias;
    }

    /**
     * @param string $alias
     * @return FieldMapping
     */
    public function setAlias($alias) {
        $this->alias = $alias;

        return $this;
    }

}