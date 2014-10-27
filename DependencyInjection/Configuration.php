<?php

namespace Hamaryuginh\MeekroDbBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('hamaryuginh_meekro_db');

        $rootNode
            ->children()
                ->arrayNode('meekrodb')
                    ->children()
                        ->arrayNode('connections')
                            ->prototype('array')
                                ->children()
                                    ->scalarNode('host')->defaultValue('localhost')->end()
                                    ->integerNode('port')->defaultValue(3306)->end()
                                    ->scalarNode('db_name')->isRequired()->end()
                                    ->scalarNode('user')->isRequired()->end()
                                    ->scalarNode('password')->defaultValue('')->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
