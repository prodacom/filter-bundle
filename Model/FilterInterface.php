<?php

namespace ProdaCom\FilterBundle\Model;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use ProdaCom\FilterBundle\Configuration\FilterConfigurationBuilder;
use ProdaCom\FilterBundle\Configuration\ResolvedFilterConfiguration;
use Symfony\Component\Form\FormInterface;

/**
 * Interface FilterInterface
 * @package ProdaCom\FilterBundle\Model
 */
interface FilterInterface {

    /**
     * @return string
     */
    public function getFormType();

    /**
     * @param EntityManagerInterface $entityManager
     * @return QueryBuilder
     */
    public function createQueryBuilder(EntityManagerInterface $entityManager);

    /**
     * @param FilterConfigurationBuilder $builder
     * @return void
     */
    public function configure(FilterConfigurationBuilder $builder);

    /**
     * @return FormInterface
     */
    public function getForm();

    /**
     * @param FormInterface $form
     * @return FilterInterface
     */
    public function setForm($form);

    /**
     * @return ResolvedFilterConfiguration
     */
    public function getConfiguration();

    /**
     * @param ResolvedFilterConfiguration $configuration
     * @return FilterInterface
     */
    public function setConfiguration(ResolvedFilterConfiguration $configuration);

}