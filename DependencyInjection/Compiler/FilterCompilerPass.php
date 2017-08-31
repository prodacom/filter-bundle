<?php

namespace ProdaCom\FilterBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class FilterCompilerPass
 * @package ProdaCom\FilterBundle\DependencyInjection\Compiler
 */
class FilterCompilerPass implements CompilerPassInterface {

    /**
     * @param ContainerBuilder $container
     * @return void
     */
    public function process(ContainerBuilder $container) {
        if (!$container->has('prodacom_filter.registry')) {
            return;
        }

        $registry = $container->findDefinition('prodacom_filter.registry');

        $taggedFilters = $container->findTaggedServiceIds('filter.type');
        foreach ($taggedFilters as $id => $taggedFilter) {
            $registry->addMethodCall('addType', [new Reference($id)]);
        }
    }

}