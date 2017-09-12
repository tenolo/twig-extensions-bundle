<?php

namespace Tenolo\Bundle\TwigExtensionsBundle\Twig\Extension;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class RoutingExtension
 *
 * @package Tenolo\Bundle\TwigExtensionsBundle\Twig\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class RoutingExtension extends AbstractExtension
{

    /** @var UrlGeneratorInterface */
    protected $generator;

    /** @var RequestStack */
    protected $requestStack;

    /**
     * @param UrlGeneratorInterface $generator
     * @param RequestStack          $requestStack
     */
    public function __construct(UrlGeneratorInterface $generator, RequestStack $requestStack)
    {
        $this->generator = $generator;
        $this->requestStack = $requestStack;
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('path_self', [$this, 'getPath']),
        ];
    }

    /**
     * @param array $parameters
     * @param bool  $relative
     *
     * @return string
     */
    public function getPath(array $parameters = [], $relative = false)
    {
        $request = $this->getRequest();

        $name = $request->get('_route');
        $parameters = array_replace_recursive($request->query->all(), $parameters);

        return $this->generator->generate($name, $parameters, $relative ? UrlGeneratorInterface::RELATIVE_PATH : UrlGeneratorInterface::ABSOLUTE_PATH);
    }

    /**
     * @return null|\Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->requestStack->getCurrentRequest();
    }
}
