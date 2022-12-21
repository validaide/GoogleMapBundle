<?php

namespace Ivory\GoogleMapBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Argument\ServiceClosureArgument;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;
use Symfony\Component\EventDispatcher\EventDispatcher;

class RegisterHelperListenerPass implements CompilerPassInterface
{
    /**
     * @var string[]
     */
    private static array $helpers = [
        'api',
        'map',
        'map.static',
        'place_autocomplete',
    ];

    /**
     * @var RegisterListenersPass[]
     */
    private array $passes = [];

    public function __construct()
    {
        foreach (self::$helpers as $helper) {
            $this->passes[] = new RegisterListenersPass(
                'ivory.google_map.helper.' . $helper . '.event_dispatcher',
                'ivory.google_map.helper.' . $helper . '.listener',
                'ivory.google_map.helper.' . $helper . '.subscriber'
            );
        }
    }

    public function process(ContainerBuilder $container)
    {
        if (!class_exists(ServiceClosureArgument::class)) {
            foreach (self::$helpers as $helper) {
                $container
                    ->getDefinition('ivory.google_map.helper.' . $helper . '.event_dispatcher')
                    ->setClass(EventDispatcher::class)
                    ->addArgument(new Reference('service_container'));
            }
        }

        foreach ($this->passes as $pass) {
            $pass->process($container);
        }
    }
}
