<?php

namespace Wucdbm\Bundle\EpayBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('wucdbm_epay');

        $rootNode
            ->children()
                ->scalarNode('client_options')
                    ->isRequired()
                ->end()
                ->scalarNode('client_handler')
                    ->isRequired()
                ->end()
            ->end();

        return $treeBuilder;
    }

}