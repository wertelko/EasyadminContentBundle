<?php

namespace Wertelko\EasyadminContentBundle\Trait;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Wertelko\EasyadminContentBundle\Content\Configurator\HeadingContentConfigurator;
use Wertelko\EasyadminContentBundle\Content\ContentInterface;
use Wertelko\EasyadminContentBundle\Factory\ContentFactory;

trait EasyAdminContentTrait
{
    protected ContentFactory $contentFactory;
    /**
     * @param array<ContentInterface> $content
     * @return Response
     * @throws \Exception
     */
    public function renderContent(
        array $content = [],
        string $title = '',
    ): Response
    {
        if (!($this instanceof AbstractController)) {
            throw new \Exception(sprintf("Controller must implement %s", AbstractController::class));
        }

        $contentDto = [];
        foreach ($content as $contentItem) {
            $this->contentFactory->configure($contentItem);
            $contentDto[] = $contentItem->getDto();
        }

        return $this->render('@EasyadminContent/page.html.twig', [
            'content' => $contentDto,
            'page_title' => $title,
        ]);
    }

    public function setContentFactory(ContentFactory $factory): static
    {
        $this->contentFactory = $factory;
        return $this;
    }
}