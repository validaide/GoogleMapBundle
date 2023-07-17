<?php


namespace Ivory\GoogleMapBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RegisterControlRendererPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $controlManagerRenderer = $container->getDefinition('ivory.google_map.helper.renderer.control.manager');

        foreach ($container->findTaggedServiceIds('ivory.google_map.helper.renderer.control') as $id => $attributes) {
            $controlManagerRenderer->addMethodCall('addRenderer', [new Reference($id)]);
        }
    }
}
