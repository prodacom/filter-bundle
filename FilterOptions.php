<?php

namespace ProdaCom\FilterBundle;

/**
 * Class FilterOptions
 * @package ProdaCom\FilterBundle
 */
class FilterOptions {

    /**
     * Equality comparison
     */
    const EQ = 'ProdaCom\FilterBundle\Comparison\EQ';

    /**
     * LIKE() comparison
     */
    const LIKE = 'ProdaCom\FilterBundle\Comparison\LIKE';

    /**
     * Greater than comparison
     */
    const GT = 'ProdaCom\FilterBundle\Comparison\GT';

    /**
     * Greater than or equal comparison
     */
    const GTE = 'ProdaCom\FilterBundle\Comparison\GTE';

    /**
     * Less than comparison
     */
    const LT = 'ProdaCom\FilterBundle\Comparison\LT';

    /**
     * Less than or equal comparison
     */
    const LTE = 'ProdaCom\FilterBundle\Comparison\LTE';

    /**
     * IN() comparison
     */
    const IN = 'ProdaCom\FilterBundle\Comparison\IN';

    /**
     * AND operator
     */
    const ANDX = 'Doctrine\ORM\Query\Expr::andX';

    /**
     * OR operator
     */
    const ORX = 'Doctrine\ORM\Query\Expr::orX';

}