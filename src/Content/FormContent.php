<?php

namespace Wertelko\EasyadminContentBundle\Content;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormView;

class FormContent extends Content
{
    public function __construct(FormView|Form $form)
    {
        if ($form instanceof Form) {
            $form = $form->createView();
        }
        parent::__construct($form);
        $this->getDto()
            ->setTemplate('@EasyadminContent/content/form.html.twig');
    }
}