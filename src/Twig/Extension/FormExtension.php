<?php

namespace Tenolo\Bundle\TwigExtensionsBundle\Twig\Extension;

use Symfony\Component\Form\FormView;
use Symfony\Component\Translation\TranslatorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class FormExtension
 *
 * @package Tenolo\Bundle\TwigExtensionsBundle\Twig\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class FormExtension extends AbstractExtension
{

    /** @var TranslatorInterface */
    protected $translator;

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('form_label', [$this, 'getFormLabel']),
        ];
    }

    /**
     * @param FormView $form
     * @param array    $parameters
     * @param null     $locale
     *
     * @return string
     */
    public function getFormLabel(FormView $form, array $parameters = [], $locale = null)
    {
        $id = $form->vars['label'];
        $domain = $form->vars['translation_domain'];

        return $this->getTranslator()->trans($id, $parameters, $domain, $locale);
    }

    /**
     * @return TranslatorInterface
     */
    protected function getTranslator()
    {
        return $this->translator;
    }
}
