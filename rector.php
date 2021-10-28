<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_74);
    $parameters->set(Option::PATHS, [
//        __DIR__ . '/DependencyInjection',
//        __DIR__ . '/Form',
//        __DIR__ . '/Templating',
//        __DIR__ . '/Twig',
        __DIR__ . '/Tests',
    ]);

//    $containerConfigurator->import(SetList::DEAD_CODE);
//    $containerConfigurator->import(SetList::DEAD_CODE);
//    $containerConfigurator->import(SetList::TYPE_DECLARATION);
//    $containerConfigurator->import(LevelSetList::UP_TO_PHP_74);
    $containerConfigurator->import(PHPUnitSetList::PHPUNIT_80);

    // $services = $containerConfigurator->services();
    // $services->set(TypedPropertyRector::class);
};
