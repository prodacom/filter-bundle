<?php

namespace ProdaCom\FilterBundle\Configuration;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Form\FormInterface;

/**
 * Class FilterConfigurationBuilder
 * @package ProdaCom\FilterBundle\Configuration
 */
class FilterConfigurationBuilder {

    /**
     * @var array
     */
    private $configuration = [];

    /**
     * @var FormInterface
     */
    private $form;

    /**
     * FilterConfigurationBuilder constructor.
     * @param FormInterface $form
     */
    public function __construct(FormInterface $form) {
        $this->form = $form;
    }

    /**
     * @param $formField
     * @param array $options
     * @return FilterConfigurationBuilder
     */
    public function addMapping($formField, array $options) {
        $processor = new Processor();

        $configuration = $processor->processConfiguration(new FilterConfiguration(), ['root' => $options]);

        if (!empty($configuration['fields'])) {
            if (isset($configuration['operator'])) {
                $this->configuration[$formField]['operator'] = $configuration['operator'];
            }

            foreach ($configuration['fields'] as $name => $fieldConfig) {
                $this->configuration[$formField]['fields'][$name] = $fieldConfig;
            }
        }

        return $this;
    }

    /**
     * @return ResolvedFilterConfiguration
     */
    public function finalizeConfiguration() {
        $configuration = new ResolvedFilterConfiguration();

        foreach ($this->configuration as $name => $fieldMappings) {
            $formField = new FormField();
            $formField
                ->setName($name)
                ->setOperatorMethod(isset($fieldMappings['operator']) ? $fieldMappings['operator'] : null)
            ;

            foreach ($fieldMappings['fields'] as $name => $filterType) {
                $alias = isset($filterType['alias']) ? $filterType['alias'] : null;

                $field = new FieldMapping($name, $filterType['comparison'], $alias);

                $formField->addField($field);
            }

            $configuration->addFormField($formField);
        }

        return $configuration;
    }

}