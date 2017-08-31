<?php

namespace ProdaCom\FilterBundle\Model;

use ProdaCom\FilterBundle\Configuration\ResolvedFilterConfiguration;
use Symfony\Component\Form\FormInterface;

/**
 * Class AbstractFilter
 * @package ProdaCom\FilterBundle\Model
 */
abstract class AbstractFilter implements FilterInterface {

    /**
     * @var FormInterface
     */
    private $form;

    /**
     * @var ResolvedFilterConfiguration
     */
    private $configuration;

    /**
     * @return FormInterface
     */
    public function getForm() {
        return $this->form;
    }

    /**
     * @param FormInterface $form
     * @return AbstractFilter
     */
    public function setForm($form) {
        $this->form = $form;

        return $this;
    }

    /**
     * @return ResolvedFilterConfiguration
     */
    public function getConfiguration() {
        return $this->configuration;
    }

    /**
     * @param ResolvedFilterConfiguration $configuration
     * @return AbstractFilter
     */
    public function setConfiguration(ResolvedFilterConfiguration $configuration) {
        $this->configuration = $configuration;

        return $this;
    }

}