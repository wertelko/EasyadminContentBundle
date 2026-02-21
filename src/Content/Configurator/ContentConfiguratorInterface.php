<?php

namespace Wertelko\EasyadminContentBundle\Content\Configurator;

use Wertelko\EasyadminContentBundle\Content\ContentInterface;

interface ContentConfiguratorInterface
{
    public function configure(ContentInterface $content): void;

    public static function getContentType(): string;
}