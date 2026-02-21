<?php

namespace Wertelko\EasyadminContentBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Wertelko\EasyadminContentBundle\EasyadminContentControllerInterface;
use Wertelko\EasyadminContentBundle\Factory\ContentFactory;

class ControllerFactoryPass implements CompilerPassInterface
{
    private const TAG = 'ea_content.controller';

    public function process(ContainerBuilder $container)
    {
        $controllerIds = $container->findTaggedServiceIds('controller.service_arguments');

        foreach (array_keys($controllerIds) as $id) {
            $definition = $container->getDefinition($id);

            if ($definition->isAbstract() || !$definition->getClass()) {
                continue;
            }

            $className = $definition->getClass();

            if (!is_string($className) || !class_exists($className)) {
                continue;
            }

            if (is_a($className, EasyadminContentControllerInterface::class, true)) {
                $definition->addTag(self::TAG);
            }
        }

        if (!$container->has(ContentFactory::class)) {
            return;
        }

        $contentFactoryReference = new Reference(ContentFactory::class);
        $taggedServices = $container->findTaggedServiceIds(self::TAG);

        foreach ($taggedServices as $id => $tags) {
            $definition = $container->findDefinition($id);
            $definition->addMethodCall('setContentFactory', [$contentFactoryReference]);
        }
    }
}