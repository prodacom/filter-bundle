<?php

namespace ProdaCom\FilterBundle\Configuration;

/**
 * Class ResolvedFilterConfiguration
 * @package ProdaCom\FilterBundle\Configuration
 */
class ResolvedFilterConfiguration {

    /**
     * @var FormField[]
     */
    private $formFields = [];

    /**
     * @return FormField[]
     */
    public function getFormFields() {
        return $this->formFields;
    }

    /**
     * @param FormField[] $formFields
     * @return ResolvedFilterConfiguration
     */
    public function setFormFields($formFields) {
        $this->formFields = $formFields;

        return $this;
    }

    /**
     * @param FormField $formField
     * @return ResolvedFilterConfiguration
     */
    public function addFormField(FormField $formField) {
        $this->formFields[] = $formField;

        return $this;
    }

}