<?php

namespace Wertelko\EasyadminContentBundle\Content;

class CodeContent extends Content
{
    const DEFAULT_TEMPLATE = '@EasyadminContent/content/code.html.twig';

    public function __construct(mixed $content = '')
    {
        parent::__construct($content);
        $this->setTemplate(self::DEFAULT_TEMPLATE);
    }
}