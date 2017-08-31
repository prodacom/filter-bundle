<?php

namespace ProdaCom\FilterBundle\Comparison;

use Doctrine\ORM\Query\Expr\Comparison;
use Doctrine\ORM\Query\Expr\Func;
use Doctrine\ORM\QueryBuilder;
use ProdaCom\FilterBundle\Configuration\FieldMapping;
use ProdaCom\FilterBundle\Configuration\FormField;

/**
 * Interface ComparisonInterface
 * @package ProdaCom\FilterBundle\Comparison
 */
interface ComparisonInterface {

    /**
     * @param QueryBuilder $queryBuilder
     * @param FormField $formField
     * @param FieldMapping $fieldMapping
     * @return \Doctrine\ORM\Query\Expr\Comparison|Func
     */
    public static function getExpression(QueryBuilder $queryBuilder, FormField $formField, FieldMapping $fieldMapping);

    /**
     * @param QueryBuilder $queryBuilder
     * @param FormField $formField
     * @param FieldMapping $fieldMapping
     * @param mixed $value
     */
    public function applyValue(QueryBuilder $queryBuilder, FormField $formField, FieldMapping $fieldMapping, $value);

}