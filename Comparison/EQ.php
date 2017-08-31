<?php

namespace ProdaCom\FilterBundle\Comparison;

use Doctrine\ORM\Query\Expr\Func;
use Doctrine\ORM\QueryBuilder;
use ProdaCom\FilterBundle\Configuration\FieldMapping;

/**
 * Class EQ
 * @package ProdaCom\FilterBundle\Comparison
 */
class EQ extends Comparison {

    /**
     * @param QueryBuilder $queryBuilder
     * @param FieldMapping $fieldMapping
     * @return \Doctrine\ORM\Query\Expr\Comparison|Func
     */
    public static function getExpression(QueryBuilder $queryBuilder, FieldMapping $fieldMapping) {
        return $queryBuilder->expr()->eq($fieldMapping->getAlias() . '.' .  $fieldMapping->getName(), ':' . $fieldMapping->getName());
    }

}