<?php

namespace Wertelko\EasyadminContentBundle\Content\Configurator;

use Wertelko\EasyadminContentBundle\Content\ContentInterface;
use Wertelko\EasyadminContentBundle\Content\FormContent;

class FormContentConfigurator implements ContentConfiguratorInterface
{

    public function configure(ContentInterface $content): void
    {
    }

    public static function getContentType(): string
    {
        return FormContent::class;
    }
}