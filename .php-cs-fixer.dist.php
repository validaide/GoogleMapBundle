<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12'                => true,
        'method_argument_space' => ['on_multiline' => 'ignore'],
    ])
    ->setFinder($finder);
