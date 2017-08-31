<?php

namespace ProdaCom\FilterBundle\Comparison;

use Doctrine\ORM\Query\Expr\Func;
use Doctrine\ORM\QueryBuilder;
use ProdaCom\FilterBundle\Configuration\FieldMapping;

/**
 * Class IN
 * @package ProdaCom\FilterBundle\Comparison
 */
class IN extends Comparison {

    /**
     * @param QueryBuilder $queryBuilder
     * @param FieldMapping $fieldMapping
     * @return \Doctrine\ORM\Query\Expr\Comparison|Func
     */
    public static function getExpression(QueryBuilder $queryBuilder, FieldMapping $fieldMapping) {
        return $queryBuilder->expr()->in($fieldMapping->getAlias() . '.' .  $fieldMapping->getName(), ':' . $fieldMapping->getName());
    }

}