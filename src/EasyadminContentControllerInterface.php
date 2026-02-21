<?php

namespace Wertelko\EasyadminContentBundle;

use Symfony\Component\HttpFoundation\Response;
use Wertelko\EasyadminContentBundle\Factory\ContentFactory;

interface EasyadminContentControllerInterface
{
    public function renderContent(array $content = []): Response;

    public function setContentFactory(ContentFactory $factory): static;
}