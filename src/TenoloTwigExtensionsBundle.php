<?php

namespace Tenolo\Bundle\TwigExtensionsBundle;

use Mmoreram\SymfonyBundleDependencies\DependentBundleInterface;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Class TenoloTwigExtensionsBundle
 *
 * @package Tenolo\Bundle\TwigExtensionsBundle
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TenoloTwigExtensionsBundle extends Bundle implements DependentBundleInterface
{

    /**
     * @inheritdoc
     */
    public static function getBundleDependencies(KernelInterface $kernel)
    {
        return [
            FrameworkBundle::class,
        ];
    }
}
