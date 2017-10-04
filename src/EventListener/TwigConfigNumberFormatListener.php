<?php

namespace Tenolo\Bundle\TwigExtensionsBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Twig\Environment;
use Twig\Extension\CoreExtension;

/**
 * Class TwigConfigNumberFormatListener
 *
 * @package Tenolo\Bundle\TwigExtensionsBundle\EventListener
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TwigConfigNumberFormatListener
{

    /** @var Environment */
    protected $twig;

    /**
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        /** @var CoreExtension $core */
        $core = $this->twig->getExtension(CoreExtension::class);

        $core->setNumberFormat(2, ',', '.');
    }
}
