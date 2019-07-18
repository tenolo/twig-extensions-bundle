<?php

namespace Tenolo\Bundle\TwigExtensionsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

/**
 * Class TenoloTwigExtensionsExtension
 *
 * @package Tenolo\Bundle\TwigExtensionsBundle\DependencyInjection
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TenoloTwigExtensionsExtension extends ConfigurableExtension
{
    /**
     * @inheritdoc
     */
    public function loadInternal(array $config, ContainerBuilder $container)
    {
        $locator = new FileLocator(__DIR__.'/../Resources/config');
        $loader = new Loader\YamlFileLoader($container, $locator);
        $loader->load('services.yml');
    }
}
