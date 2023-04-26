<?php

/*
 * This file is part of the Ivory Google Map bundle package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMapBundle\Tests\Twig;

use PHPUnit\Framework\MockObject\MockObject;
use Ivory\GoogleMap\Helper\StaticMapHelper;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMapBundle\Twig\StaticMapExtension;
use Twig\Extension\AbstractExtension;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class StaticMapExtensionTest extends AbstractExtensionTest
{
    /**
     * @var StaticMapHelper|MockObject|null
     */
    private StaticMapHelper|MockObject|null $staticMapHelper = null;

    protected function createExtension(): AbstractExtension
    {
        $this->staticMapHelper = $this->createStaticMapHelperMock();

        return new StaticMapExtension($this->staticMapHelper);
    }

    public function testRender()
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_map_static(map) }}');

        $this->staticMapHelper
            ->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($map = $this->createMapMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['map' => $map]));
    }

    private function createStaticMapHelperMock(): MockObject|StaticMapHelper
    {
        return $this->createMock(StaticMapHelper::class);
    }

    private function createMapMock(): MockObject|Map
    {
        return $this->createMock(Map::class);
    }
}
