<?php

namespace Wertelko\EasyadminContentBundle\Content;

use Wertelko\EasyadminContentBundle\Dto\ContentDto;

interface ContentInterface
{
    public static function new(mixed $content = null);

    public function getDto(): ContentDto;

    public function setContent(mixed $content): static;

    public function setHtmlContent(string $htmlContent): static;
}