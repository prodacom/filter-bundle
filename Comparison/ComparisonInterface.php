<?php

namespace ProdaCom\FilterBundle\Comparison;

use Doctrine\ORM\Query\Expr\Comparison;
use Doctrine\ORM\Query\Expr\Func;
use Doctrine\ORM\QueryBuilder;
use ProdaCom\FilterBundle\Configuration\FieldMapping;

/**
 * Interface ComparisonInterface
 * @package ProdaCom\FilterBundle\Comparison
 */
interface ComparisonInterface {

    /**
     * @param QueryBuilder $queryBuilder
     * @param FieldMapping $fieldMapping
     * @return \Doctrine\ORM\Query\Expr\Comparison|Func
     */
    public static function getExpression(QueryBuilder $queryBuilder, FieldMapping $fieldMapping);

    /**
     * @param QueryBuilder $queryBuilder
     * @param string $field
     * @param mixed $value
     * @return void
     */
    public function applyValue(QueryBuilder $queryBuilder, $field, $value);

}