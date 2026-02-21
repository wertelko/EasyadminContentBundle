<?php

namespace Wertelko\EasyadminContentBundle\Content;

class ListContent extends Content
{
    const OPTION_NAME_LIST_TYPE = 'list_type';
    const OPTION_LIST_TYPE_UL = 'ul';
    const OPTION_LIST_TYPE_OL = 'ol';
    public function __construct(mixed $content = [])
    {
        $content ??= [];
        parent::__construct($content);
        $this->getDto()
            ->setOption('list_type', self::OPTION_LIST_TYPE_UL)
            ->setTemplate('@EasyadminContent/content/list.html.twig');
    }

    public function asUnordered(): static
    {
        $this->getDto()->setOption(self::OPTION_NAME_LIST_TYPE, self::OPTION_LIST_TYPE_UL);
        return $this;
    }

    public function asOrdered(): static
    {
        $this->getDto()->setOption(self::OPTION_NAME_LIST_TYPE, self::OPTION_LIST_TYPE_OL);
        return $this;
    }
}