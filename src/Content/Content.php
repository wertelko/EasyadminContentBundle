<?php

namespace Wertelko\EasyadminContentBundle\Content;

use Wertelko\EasyadminContentBundle\Dto\ContentDto;

class Content implements ContentInterface
{
    private ContentDto $dto;

    public function __construct(mixed $content = null)
    {
        $this->dto = new ContentDto();
        $this->dto->setContent($content);
    }

    public static function new(mixed $content = null)
    {
        return new static($content);
    }

    public function getDto(): ContentDto
    {
        return $this->dto;
    }

    public function setHtmlContent(string $htmlContent): static
    {
        $this->dto->setHtmlContent($htmlContent);
        return $this;
    }

    public function setContent(mixed $content): static
    {
        $this->dto->setContent($content);
        return $this;
    }
}