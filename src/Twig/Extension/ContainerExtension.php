<?php

namespace Tenolo\Bundle\TwigExtensionsBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class ContainerExtension
 *
 * @package Tenolo\Bundle\TwigExtensionsBundle\Twig\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class ContainerExtension extends AbstractExtension
{

    /** @var ContainerInterface */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('config', [$this, 'getConfigParameter']),
            new TwigFunction('config_parameter', [$this, 'getConfigParameter']),
        ];
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function getConfigParameter($name)
    {
        return $this->container->getParameter($name);
    }

}
