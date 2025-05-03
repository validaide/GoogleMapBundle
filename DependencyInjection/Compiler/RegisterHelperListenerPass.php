<?php

namespace Ivory\GoogleMapBundle\DependencyInjection\Compiler;

use InvalidArgumentException;
use Symfony\Component\DependencyInjection\Argument\ServiceClosureArgument;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RegisterHelperListenerPass implements CompilerPassInterface
{
    private static array $helpers = [
        'api',
        'map',
        'map.static',
        'place_autocomplete',
    ];

    public function process(ContainerBuilder $container): void
    {
        foreach (self::$helpers as $helper) {
            $dispatcherId  = 'ivory.google_map.helper.' . $helper . '.event_dispatcher';
            $listenerTag   = 'ivory.google_map.helper.' . $helper . '.listener';
            $subscriberTag = 'ivory.google_map.helper.' . $helper . '.subscriber';

            if (!$container->hasDefinition($dispatcherId)) {
                continue;
            }

            $dispatcherDefinition = $container->getDefinition($dispatcherId);

            foreach ($container->findTaggedServiceIds($listenerTag) as $id => $tags) {
                foreach ($tags as $attributes) {
                    $method = $attributes['method'] ?? '__invoke';
                    $event  = $attributes['event'] ?? null;

                    if (null === $event) {
                        throw new InvalidArgumentException(sprintf('The service "%s" must define the "event" attribute on "%s" tags.', $id, $listenerTag));
                    }

                    $priority = $attributes['priority'] ?? 0;

                    $dispatcherDefinition->addMethodCall('addListener', [
                        $event,
                        [new ServiceClosureArgument(new Reference($id)), $method],
                        $priority,
                    ]);
                }
            }

            foreach ($container->findTaggedServiceIds($subscriberTag) as $id => $tags) {
                $dispatcherDefinition->addMethodCall('addSubscriber', [
                    new Reference($id),
                ]);
            }
        }
    }
}
