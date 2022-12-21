<?php


namespace Ivory\GoogleMapBundle\DependencyInjection\Compiler;

use RuntimeException;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RegisterExtendableRendererPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $tag = 'ivory.google_map.helper.renderer.extendable';
        $extendableRenderer = $container->getDefinition('ivory.google_map.helper.renderer.overlay.extendable');

        foreach ($container->findTaggedServiceIds($tag) as $id => $attributes) {
            foreach ($attributes as $attribute) {
                if (!isset($attribute['class'])) {
                    throw new RuntimeException(sprintf(
                        'No "class" attribute found for the tag "%s" on the service "%s".',
                        $tag,
                        $id
                    ));
                }

                $extendableRenderer->addMethodCall('setRenderer', [$attribute['class'], new Reference($id)]);
            }
        }
    }
}
