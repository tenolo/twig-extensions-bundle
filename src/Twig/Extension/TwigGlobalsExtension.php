<?php

namespace Tenolo\Bundle\TwigExtensionsBundle\Twig\Extension;

use Tenolo\Bundle\TwigExtensionsBundle\Service\TwigGlobalsManager;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

/**
 * Class TwigGlobalsExtension
 *
 * @package Tenolo\Bundle\TwigExtensionsBundle\Twig\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TwigGlobalsExtension extends AbstractExtension implements GlobalsInterface
{

    /** @var TwigGlobalsManager */
    protected $globalsManager;

    /**
     * @param TwigGlobalsManager $globalsManager
     */
    public function __construct(TwigGlobalsManager $globalsManager)
    {
        $this->globalsManager = $globalsManager;
    }

    /**
     * @inheritdoc
     */
    public function getGlobals()
    {
        return $this->globalsManager->getGlobals();
    }
}
