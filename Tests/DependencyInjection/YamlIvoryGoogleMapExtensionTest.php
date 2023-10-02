<?php


namespace Ivory\GoogleMapBundle\Tests\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class YamlIvoryGoogleMapExtensionTest extends AbstractIvoryGoogleMapExtensionTest
{
    protected function loadConfiguration(ContainerBuilder $container, $configuration)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Fixtures/Config/Yaml'));
        $loader->load($configuration.'.yml');
    }
}
