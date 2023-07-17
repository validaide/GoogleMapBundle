<?php


namespace Ivory\GoogleMapBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CleanTemplatingPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('templating.engine.php')) {
            $container->removeDefinition('ivory.google_map.templating.api');
            $container->removeDefinition('ivory.google_map.templating.map');
            $container->removeDefinition('ivory.google_map.templating.map.static');
            $container->removeDefinition('ivory.google_map.templating.place_autocomplete');
        }

        if (!$container->hasDefinition('twig')) {
            $container->removeDefinition('ivory.google_map.twig.extension.api');
            $container->removeDefinition('ivory.google_map.twig.extension.map');
            $container->removeDefinition('ivory.google_map.twig.extension.map.static');
            $container->removeDefinition('ivory.google_map.twig.extension.place_autocomplete');
        }
    }
}
