<?php

namespace Wertelko\EasyadminContentBundle\Content\Configurator;

use Wertelko\EasyadminContentBundle\Content\ContentInterface;
use Wertelko\EasyadminContentBundle\Content\HeadingContent;

class HeadingContentConfigurator implements ContentConfiguratorInterface
{

    public function configure(ContentInterface $content): void
    {
        $dto = $content->getDto();
        if (null !== $dto->getHtmlContent()) {
            return;
        }

        $ha = $dto->getOption(HeadingContent::HEADING_ATTRIBUTE_OPTION_NAME, HeadingContent::H1);
        $dto->setHtmlContent(sprintf('<%1$s>%2$s</%1$s>', $ha, $dto->getContent()));
    }

    public static function getContentType(): string
    {
        return HeadingContent::class;
    }
}