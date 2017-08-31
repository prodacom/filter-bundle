<?php

namespace ProdaCom\FilterBundle\Configuration;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class FieldConfiguration
 * @package ProdaCom\FilterBundle\Configuration
 */
class FilterConfiguration implements ConfigurationInterface {

    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('root');
        $rootNode
            ->children()
                ->scalarNode('operator')->end()
                ->arrayNode('fields')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('comparison')->isRequired()->end()
                            ->scalarNode('alias')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}