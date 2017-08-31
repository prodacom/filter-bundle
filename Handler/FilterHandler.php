<?php

namespace ProdaCom\FilterBundle\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use ProdaCom\FilterBundle\Configuration\FieldMapping;
use ProdaCom\FilterBundle\Exception\UnexpectedTypeException;
use ProdaCom\FilterBundle\Model\FilterInterface;

/**
 * Class FilterHandler
 * @package ProdaCom\FilterBundle\Handler
 */
class FilterHandler {

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * FilterHandler constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @param FilterInterface $filter
     * @return mixed
     */
    public function handle(FilterInterface $filter) {
        $queryBuilder = $this->resolveQueryBuilder($filter);

        foreach ($filter->getConfiguration()->getFormFields() as $formField) {
            $value = $filter->getForm()->get($formField->getName())->getData();

            if (true === $formField->hasOperator()) {
                $expressions = [];

                foreach ($formField->getFieldMappings() as $fieldMapping) {
                    $this->resolveAlias($queryBuilder, $fieldMapping);

                    $expressions[] = call_user_func_array([$fieldMapping->getComparisonClass(), 'getExpression'], [$queryBuilder, $fieldMapping]);

                    call_user_func_array([$fieldMapping->getComparisonClass(), 'applyValue'], [$queryBuilder, $fieldMapping->getName(), $value]);
                }

                $queryBuilder->andWhere(call_user_func_array($formField->getOperatorMethod(), $expressions));
            } else {
                foreach ($formField->getFieldMappings() as $fieldMapping) {
                    $this->resolveAlias($queryBuilder, $fieldMapping);

                    $queryBuilder->andWhere(call_user_func_array([$fieldMapping->getComparisonClass(), 'getExpression'], [$queryBuilder, $fieldMapping]));

                    call_user_func_array([$fieldMapping->getComparisonClass(), 'applyValue'], [$queryBuilder, $fieldMapping->getName(), $value]);
                }
            }
        }

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @param FilterInterface $filter
     * @return QueryBuilder
     */
    private function resolveQueryBuilder(FilterInterface $filter) {
        $queryBuilder = $filter->createQueryBuilder($this->entityManager);
        if (!$queryBuilder instanceof QueryBuilder) {
            throw new UnexpectedTypeException($queryBuilder, QueryBuilder::class);
        }

        return $queryBuilder;
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param FieldMapping $fieldMapping
     * @return string
     */
    private function resolveAlias(QueryBuilder $queryBuilder, FieldMapping $fieldMapping) {
        if (null === $fieldMapping->getAlias()) {
            $fieldMapping->setAlias(current($queryBuilder->getRootAliases()));
        }

        return $fieldMapping->getAlias();
    }

}