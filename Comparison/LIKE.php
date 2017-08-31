<?php

namespace ProdaCom\FilterBundle\Comparison;

use Doctrine\ORM\Query\Expr\Func;
use Doctrine\ORM\QueryBuilder;
use ProdaCom\FilterBundle\Configuration\FieldMapping;

/**
 * Class LIKE
 * @package ProdaCom\FilterBundle\Comparison
 */
class LIKE extends Comparison {

    /**
     * @param QueryBuilder $queryBuilder
     * @param FieldMapping $fieldMapping
     * @return \Doctrine\ORM\Query\Expr\Comparison|Func
     */
    public static function getExpression(QueryBuilder $queryBuilder, FieldMapping $fieldMapping) {
        return $queryBuilder->expr()->like($fieldMapping->getAlias() . '.' .  $fieldMapping->getName(), ':' . $fieldMapping->getName());
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param string $field
     * @param mixed $value
     */
    public function applyValue(QueryBuilder $queryBuilder, $field, $value) {
        $queryBuilder->setParameter($field, '%' . $value . '%');
    }

}