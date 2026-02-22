<?php

namespace Wertelko\EasyadminContentBundle\Content;

class TableContent extends Content
{
    const DEFAULT_TEMPLATE = '@EasyadminContent/content/table.html.twig';

    public function __construct(mixed $content = [])
    {
        $content ??= [];
        parent::__construct($content);
        $this->disableHeaders(false)
            ->setTemplate(self::DEFAULT_TEMPLATE);
    }

    public function disableHeaders(bool $headers = true): static
    {
        $this->getDto()
            ->setOption('display_headers', !$headers);
        return $this;
    }

    public function setHeaders(array $headers): static
    {
        $this->getDto()->setOption('headers', $headers);
        return $this;
    }
}