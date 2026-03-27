<?php

namespace Wertelko\EasyadminContentBundle\Content\Configurator;

use Wertelko\EasyadminContentBundle\Content\CodeContent;
use Wertelko\EasyadminContentBundle\Content\ContentInterface;

class CodeContentConfigurator implements ContentConfiguratorInterface
{

    public function configure(ContentInterface $content): void
    {
        $dto = $content->getDto();
        if (null === $dto->getHtmlContent()) {
            return;
        }

        $dto->setHtmlContent($dto->getContent());
    }

    public static function getContentType(): string
    {
        return CodeContent::class;
    }
}