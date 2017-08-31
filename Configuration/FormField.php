<?php

namespace ProdaCom\FilterBundle\Configuration;

/**
 * Class FormField
 * @package ProdaCom\FilterBundle\Configuration
 */
class FormField {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $operatorMethod;

    /**
     * @var FieldMapping[]
     */
    private $fieldMappings = [];

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return FormField
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getOperatorMethod() {
        return $this->operatorMethod;
    }

    /**
     * @param string $operatorMethod
     * @return FormField
     */
    public function setOperatorMethod($operatorMethod) {
        $this->operatorMethod = $operatorMethod;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasOperator() {
        return null !== $this->operatorMethod;
    }

    /**
     * @return FieldMapping[]
     */
    public function getFieldMappings() {
        return $this->fieldMappings;
    }

    /**
     * @param FieldMapping[] $fieldMappings
     * @return FormField
     */
    public function setFieldMappings($fieldMappings) {
        $this->fieldMappings = $fieldMappings;

        return $this;
    }

    /**
     * @param FieldMapping $field
     * @return FormField
     */
    public function addField(FieldMapping $field) {
        $this->fieldMappings[] = $field;

        return $this;
    }

}