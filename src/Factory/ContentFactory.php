<?php

namespace Wertelko\EasyadminContentBundle\Factory;

use Wertelko\EasyadminContentBundle\Content\Configurator\ContentConfiguratorInterface;
use Wertelko\EasyadminContentBundle\Content\ContentInterface;
use Wertelko\EasyadminContentBundle\Dto\ContentDto;

class ContentFactory
{
    /**
     * @var array<string, ContentConfiguratorInterface>
     */
    private mixed $configurators;

    /**
     * @param iterable<ContentConfiguratorInterface> $configurators
     */
    public function __construct(
        iterable $configurators = [],
    )
    {
        foreach ($configurators as $configurator) {
            $this->configurators[$configurator::getContentType()] = $configurator;
        }
    }
    public function configure(ContentInterface $content)
    {
        if (!array_key_exists($content::class, $this->configurators)) {
            throw new \InvalidArgumentException(sprintf(
                "%s content type doesn't exist", $content::class
            ));
        }
        $this->configurators[$content::class]->configure($content);
    }
}