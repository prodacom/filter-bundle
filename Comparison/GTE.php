<?php

namespace ProdaCom\FilterBundle\Comparison;

use Doctrine\ORM\Query\Expr\Func;
use Doctrine\ORM\QueryBuilder;
use ProdaCom\FilterBundle\Configuration\FieldMapping;
use ProdaCom\FilterBundle\Configuration\FormField;

/**
 * Class GTE
 * @package ProdaCom\FilterBundle\Comparison
 */
class GTE extends Comparison {

    /**
     * @param QueryBuilder $queryBuilder
     * @param FormField $formField
     * @param FieldMapping $fieldMapping
     * @return \Doctrine\ORM\Query\Expr\Comparison|Func
     */
    public static function getExpression(QueryBuilder $queryBuilder, FormField $formField,FieldMapping $fieldMapping) {
        $binding = ':' . $formField->getName() . '_' . $fieldMapping->getName();

        return $queryBuilder->expr()->gte($fieldMapping->getAlias() . '.' .  $fieldMapping->getName(), $binding);
    }

}