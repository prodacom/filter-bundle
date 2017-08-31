<?php

namespace ProdaCom\FilterBundle\Comparison;

use Doctrine\ORM\QueryBuilder;
use ProdaCom\FilterBundle\Configuration\FieldMapping;
use ProdaCom\FilterBundle\Configuration\FormField;

/**
 * Class Comparison
 * @package ProdaCom\FilterBundle\Comparison
 */
abstract class Comparison implements ComparisonInterface {

    /**
     * @param QueryBuilder $queryBuilder
     * @param FormField $formField
     * @param FieldMapping $fieldMapping
     * @param mixed $value
     */
    public function applyValue(QueryBuilder $queryBuilder, FormField $formField, FieldMapping $fieldMapping, $value) {
        $binding = $formField->getName() . '_' . $fieldMapping->getName();

        $queryBuilder->setParameter($binding, $value);
    }

}