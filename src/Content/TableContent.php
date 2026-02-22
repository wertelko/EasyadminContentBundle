<?php

namespace Wertelko\EasyadminContentBundle\Content;

class TableContent extends Content
{
    const DEFAULT_TEMPLATE = '@EasyadminContent/content/table.html.twig';

    public function __construct(mixed $content = [])
    {
        $content ??= [];
        parent::__construct($content);
        $this->hideHeaders(false)
            ->setTemplate(self::DEFAULT_TEMPLATE);
    }

    public function hideHeaders(bool $hidden = true): static
    {
        $this->getDto()
            ->setOption('display_headers', !$hidden);
        return $this;
    }

    public function setHeaders(array $headers): static
    {
        $this->getDto()->setOption('headers', $headers);
        return $this;
    }
}