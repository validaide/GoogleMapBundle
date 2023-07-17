<?php


namespace Ivory\GoogleMapBundle\Tests\Twig;

use Twig_Environment;
use Twig_Loader_Filesystem;
use Twig_Extension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\Loader\FilesystemLoader;

abstract class AbstractExtensionTest extends TestCase
{
    private Environment $twig;

    protected function setUp(): void
    {
        $this->twig = new Environment(new FilesystemLoader([]));
        $this->twig->addExtension($this->createExtension());
    }

    abstract protected function createExtension(): AbstractExtension;

    protected function getTwig(): Environment
    {
        return $this->twig;
    }
}
