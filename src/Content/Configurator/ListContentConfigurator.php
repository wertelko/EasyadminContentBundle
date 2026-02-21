<?php

namespace Wertelko\EasyadminContentBundle\Content\Configurator;

use Wertelko\EasyadminContentBundle\Content\ContentInterface;
use Wertelko\EasyadminContentBundle\Content\ListContent;

class ListContentConfigurator implements ContentConfiguratorInterface
{

    public function configure(ContentInterface $content): void
    {
    }

    public static function getContentType(): string
    {
        return ListContent::class;
    }
}