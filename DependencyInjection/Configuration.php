<?php

namespace Checkdomain\TeleCashBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('checkdomain_tele_cash');

        $rootNode
            ->children()
                ->arrayNode('api')
                    ->children()
                        ->scalarNode('user')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('pass')->isRequired()->cannotBeEmpty()->end()
                    ->end()
                ->end()
                ->arrayNode('client_key')
                    ->children()
                        ->scalarNode('path')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('pass_phrase')->isRequired()->cannotBeEmpty()->end()
                    ->end()
                ->end()
                ->scalarNode('client_cert_path')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('server_cert_path')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('service_url')->isRequired()->cannotBeEmpty()->end()
            ->end();

        return $treeBuilder;
    }
}
