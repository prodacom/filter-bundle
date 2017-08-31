<?php

namespace ProdaCom\FilterBundle;

use ProdaCom\FilterBundle\DependencyInjection\Compiler\FilterCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class ProdaComFilterBundle
 * @package ProdaCom\FilterBundle
 */
class ProdaComFilterBundle extends Bundle {

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container) {
        parent::build($container);

        $container->addCompilerPass(new FilterCompilerPass());
    }

}