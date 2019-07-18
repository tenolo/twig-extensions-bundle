<?php

namespace Tenolo\Bundle\TwigExtensionsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package Tenolo\Bundle\TwigExtensionsBundle\DependencyInjection
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class Configuration implements ConfigurationInterface
{

    public const ROOT_NODE = 'tenolo_twig_extensions';

    /**
     * @inheritdoc
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(static::ROOT_NODE);

        if (method_exists($treeBuilder, 'getRootNode')) {
            // Symfony 4.2 +
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // Symfony 4.1 and below
            $rootNode = $treeBuilder->root(static::ROOT_NODE);
        }

        return $treeBuilder;
    }
}
