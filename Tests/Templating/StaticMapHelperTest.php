<?php

/*
 * This file is part of the Ivory Google Map bundle package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMapBundle\Tests\Templating;

use Ivory\GoogleMap\Helper\StaticMapHelper as BaseStaticMapHelper;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMapBundle\Templating\StaticMapHelper;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class StaticMapHelperTest extends TestCase
{
    private StaticMapHelper $staticMapHelper;

    private BaseStaticMapHelper|MockObject $innerStaticMapHelper;

    protected function setUp(): void
    {
        $this->innerStaticMapHelper = $this->createStaticMapHelperMock();
        $this->staticMapHelper      = new StaticMapHelper($this->innerStaticMapHelper);
    }

    public function testRender()
    {
        $this->innerStaticMapHelper
            ->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($map = $this->createMapMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $this->staticMapHelper->render($map));
    }

    public function testName()
    {
        $this->assertSame('ivory_google_map_static', $this->staticMapHelper->getName());
    }

    /*****************************************************************************/
    /* Helpers
    /*****************************************************************************/

    private function createStaticMapHelperMock(): MockObject|BaseStaticMapHelper
    {
        return $this->createMock(BaseStaticMapHelper::class);
    }

    private function createMapMock(): MockObject|Map
    {
        return $this->createMock(Map::class);
    }
}
