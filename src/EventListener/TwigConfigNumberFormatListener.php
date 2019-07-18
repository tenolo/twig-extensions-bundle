<?php

namespace Tenolo\Bundle\TwigExtensionsBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;
use Twig\Extension\CoreExtension;

/**
 * Class TwigConfigNumberFormatListener
 *
 * @package Tenolo\Bundle\TwigExtensionsBundle\EventListener
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TwigConfigNumberFormatListener implements EventSubscriberInterface
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
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
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
