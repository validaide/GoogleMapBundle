<?php


use PHPUnit\Extensions\Selenium2TestCase;

if (isset($_SERVER['CACHE_PATH'])) {
    $_SERVER['CACHE_PATH'] = __DIR__.'/../'.$_SERVER['CACHE_PATH'];

    if (isset($_SERVER['CACHE_RESET']) && $_SERVER['CACHE_RESET']) {
        exec('rm -rf '.$_SERVER['CACHE_PATH'].'/*');
    }
}

require_once __DIR__.'/../vendor/autoload.php';

Selenium2TestCase::shareSession(true);
