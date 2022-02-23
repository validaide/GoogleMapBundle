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
use stdClass;
use Ivory\GoogleMap\Helper\ApiHelper;
use Ivory\GoogleMapBundle\Twig\ApiExtension;
use Twig\Extension\AbstractExtension;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class ApiExtensionTest extends AbstractExtensionTest
{
    /**
     * @var ApiHelper|MockObject
     */
    private $apiHelper;

    protected function createExtension(): AbstractExtension
    {
        $this->apiHelper = $this->createApiHelperMock();

        return new ApiExtension($this->apiHelper);
    }

    public function testRender()
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_api([object]) }}');

        $this->apiHelper
            ->expects($this->once())
            ->method('render')
            ->with($this->identicalTo([$object = new stdClass()]))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['object' => $object]));
    }

    /**
     * @return MockObject|ApiHelper
     */
    private function createApiHelperMock()
    {
        return $this->createMock(ApiHelper::class);
    }
}
