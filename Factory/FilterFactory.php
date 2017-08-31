<?php

namespace ProdaCom\FilterBundle\Factory;

use ProdaCom\FilterBundle\Configuration\FilterConfigurationBuilder;
use ProdaCom\FilterBundle\Model\FilterInterface;
use ProdaCom\FilterBundle\Registry\FilterRegistry;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class FilterFactory
 * @package ProdaCom\FilterBundle\Factory
 */
class FilterFactory {

    /**
     * @var FilterRegistry
     */
    private $registry;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * FilterFactory constructor.
     * @param FilterRegistry $registry
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FilterRegistry $registry, FormFactoryInterface $formFactory) {
        $this->registry = $registry;
        $this->formFactory = $formFactory;
    }

    /**
     * @param string $type
     * @return FilterInterface
     */
    public function create($type) {
        $filter = $this->registry->get($type);

        $form = $this->formFactory->create($filter->getFormType());

        $configurationBuilder = $this->createConfigurationBuilder($form);

        /*
         * Configure fields and mappings
         */
        $filter->configure($configurationBuilder);

        $filter->setForm($form);
        $filter->setConfiguration($configurationBuilder->finalizeConfiguration());

        return $filter;
    }

    /**
     * @param FormInterface $form
     * @return FilterConfigurationBuilder
     */
    private function createConfigurationBuilder(FormInterface $form) {
        return new FilterConfigurationBuilder($form);
    }

}