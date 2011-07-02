<?php

namespace Ornicar\InsaneMarkdownBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * This class Configuration the configuration information for the bundle
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 */
class Configuration
{
    /**
     * Generates the configuration tree.
     *
     * @return NodeInterface
     */
    public function getConfigTree()
    {
        $treeBuilder = new TreeBuilder();

        $treeBuilder->root('ornicar_insane_markdown', 'array')
            ->children()
                ->scalarNode('path')->isRequired()->end()
            ->end()
        ->end();

        return $treeBuilder->buildTree();
    }
}
