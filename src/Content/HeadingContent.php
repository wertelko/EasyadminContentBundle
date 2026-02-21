<?php

namespace Wertelko\EasyadminContentBundle\Content;

class HeadingContent extends Content
{
    public const HEADING_ATTRIBUTE_OPTION_NAME = 'heading_attribute';
    public const H1 = 'h1';
    public const H2 = 'h2';
    public const H3 = 'h3';
    public const H4 = 'h4';
    public const H5 = 'h5';
    public const H6 = 'h6';

    public function asH1(): static
    {
        $this->getDto()->setOption(HeadingContent::HEADING_ATTRIBUTE_OPTION_NAME, self::H1);
        return $this;
    }

    public function asH2(): static
    {
        $this->getDto()->setOption(HeadingContent::HEADING_ATTRIBUTE_OPTION_NAME, self::H2);
        return $this;
    }

    public function asH3(): static
    {
        $this->getDto()->setOption(HeadingContent::HEADING_ATTRIBUTE_OPTION_NAME, self::H3);
        return $this;
    }

    public function asH4(): static
    {
        $this->getDto()->setOption(HeadingContent::HEADING_ATTRIBUTE_OPTION_NAME, self::H4);
        return $this;
    }

    public function asH5(): static
    {
        $this->getDto()->setOption(HeadingContent::HEADING_ATTRIBUTE_OPTION_NAME, self::H5);
        return $this;
    }

    public function asH6(): static
    {
        $this->getDto()->setOption(HeadingContent::HEADING_ATTRIBUTE_OPTION_NAME, self::H6);
        return $this;
    }
}