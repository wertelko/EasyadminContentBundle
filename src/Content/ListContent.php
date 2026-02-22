<?php

namespace Wertelko\EasyadminContentBundle\Content;

class ListContent extends Content
{
    const DEFAULT_TEMPLATE = '@EasyadminContent/content/list.html.twig';
    const OPTION_LIST_TYPE_OL = 'ol';
    const OPTION_LIST_TYPE_UL = 'ul';
    const OPTION_NAME_LIST_TYPE = 'list_type';

    public function __construct(mixed $content = [])
    {
        $content ??= [];
        parent::__construct($content);
        $this
            ->setOption(self::OPTION_NAME_LIST_TYPE, self::OPTION_LIST_TYPE_UL)
            ->setTemplate(self::DEFAULT_TEMPLATE);
    }

    public function asOrdered(): static
    {
        $this->getDto()->setOption(self::OPTION_NAME_LIST_TYPE, self::OPTION_LIST_TYPE_OL);
        return $this;
    }

    public function asUnordered(): static
    {
        $this->getDto()->setOption(self::OPTION_NAME_LIST_TYPE, self::OPTION_LIST_TYPE_UL);
        return $this;
    }
}