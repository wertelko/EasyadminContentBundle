<?php

namespace Wertelko\EasyadminContentBundle\Dto;

class ContentDto
{
    private mixed $content = null;
    private ?string $htmlContent = null;
    /**
     * @var array<string|int, mixed>
     */
    private array $options = [];
    private string $template = '@EasyadminContent/content/content.html.twig';

    public function __toString(): string
    {
        return $this->getHtmlContent() ?? '';
    }

    public function getContent(): mixed
    {
        return $this->content;
    }

    public function setContent(mixed $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function getHtmlContent(): ?string
    {
        return $this->htmlContent;
    }

    public function setHtmlContent(?string $htmlContent): static
    {
        $this->htmlContent = $htmlContent;
        return $this;
    }

    public function getOption(string|int $key, mixed $default = null): mixed
    {
        return $this->options[$key] ?? $default;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function setTemplate(string $template): static
    {
        $this->template = $template;
        return $this;
    }

    public function setOption(string|int $key, mixed $value): static
    {
        $this->options[$key] = $value;
        return $this;
    }
}