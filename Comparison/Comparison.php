<?php

namespace ProdaCom\FilterBundle\Comparison;

use Doctrine\ORM\QueryBuilder;

/**
 * Class Comparison
 * @package ProdaCom\FilterBundle\Comparison
 */
abstract class Comparison implements ComparisonInterface {

    /**
     * @param QueryBuilder $queryBuilder
     * @param string $field
     * @param mixed $value
     * @return void
     */
    public function applyValue(QueryBuilder $queryBuilder, $field, $value) {
        $queryBuilder->setParameter($field, $value);
    }

}