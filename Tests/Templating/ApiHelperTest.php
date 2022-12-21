<?php


namespace Ivory\GoogleMapBundle\Tests\Templating;

use PHPUnit\Framework\MockObject\MockObject;
use stdClass;
use Ivory\GoogleMap\Helper\ApiHelper as BaseApiHelper;
use Ivory\GoogleMapBundle\Templating\ApiHelper;
use PHPUnit\Framework\TestCase;

class ApiHelperTest extends TestCase
{
    private ApiHelper $apiHelper;

    /**
     * @var BaseApiHelper|MockObject
     */
    private $innerApiHelper;

    protected function setUp(): void
    {
        $this->innerApiHelper = $this->createApiHelperMock();
        $this->apiHelper = new ApiHelper($this->innerApiHelper);
    }

    public function testRender()
    {
        $this->innerApiHelper
            ->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($objects = [new stdClass()]))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $this->apiHelper->render($objects));
    }

    public function testName()
    {
        $this->assertSame('ivory_google_api', $this->apiHelper->getName());
    }

    /**
     * @return MockObject|BaseApiHelper
     */
    private function createApiHelperMock()
    {
        return $this->createMock(BaseApiHelper::class);
    }
}
