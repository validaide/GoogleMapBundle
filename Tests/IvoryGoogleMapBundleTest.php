<?php


namespace Ivory\GoogleMapBundle\Tests;

use Ivory\GoogleMapBundle\IvoryGoogleMapBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class IvoryGoogleMapBundleTest extends TestCase
{
    private IvoryGoogleMapBundle $bundle;

    protected function setUp(): void
    {
        $this->bundle = new IvoryGoogleMapBundle();
    }

    public function testBundle()
    {
        $this->assertInstanceOf(Bundle::class, $this->bundle);
    }
}
