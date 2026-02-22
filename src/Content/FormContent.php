<?php

namespace Wertelko\EasyadminContentBundle\Content;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormView;

class FormContent extends Content
{
    const DEFAULT_TEMPLATE = '@EasyadminContent/content/form.html.twig';

    public function __construct(FormView|Form $form)
    {
        if ($form instanceof Form) {
            $form = $form->createView();
        }
        parent::__construct($form);
        $this->setTemplate(self::DEFAULT_TEMPLATE);
    }
}