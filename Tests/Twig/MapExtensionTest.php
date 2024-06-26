<?php


namespace Ivory\GoogleMapBundle\Tests\Twig;

use PHPUnit\Framework\MockObject\MockObject;
use Ivory\GoogleMap\Helper\MapHelper;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMapBundle\Twig\MapExtension;
use Twig\Extension\AbstractExtension;

class MapExtensionTest extends AbstractExtensionTest
{
    /**
     * @var MapHelper|MockObject|null
     */
    private MapHelper|MockObject|null $mapHelper = null;

    protected function createExtension(): AbstractExtension
    {
        $this->mapHelper = $this->createMapHelperMock();

        return new MapExtension($this->mapHelper);
    }

    public function testRender()
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_map(map) }}');

        $this->mapHelper
            ->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($map = $this->createMapMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['map' => $map]));
    }

    public function testRenderHtml()
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_map_container(map) }}');

        $this->mapHelper
            ->expects($this->once())
            ->method('renderHtml')
            ->with($this->identicalTo($map = $this->createMapMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['map' => $map]));
    }

    public function testRenderStylesheet()
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_map_css(map) }}');

        $this->mapHelper
            ->expects($this->once())
            ->method('renderStylesheet')
            ->with($this->identicalTo($map = $this->createMapMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['map' => $map]));
    }

    public function testRenderJavascript()
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_map_js(map) }}');

        $this->mapHelper
            ->expects($this->once())
            ->method('renderJavascript')
            ->with($this->identicalTo($map = $this->createMapMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['map' => $map]));
    }

    private function createMapHelperMock(): MockObject|MapHelper
    {
        return $this->createMock(MapHelper::class);
    }

    private function createMapMock(): MockObject|Map
    {
        return $this->createMock(Map::class);
    }
}
