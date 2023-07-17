<?php


namespace Ivory\GoogleMapBundle\Tests\Templating;

use PHPUnit\Framework\MockObject\MockObject;
use Ivory\GoogleMap\Helper\PlaceAutocompleteHelper as BasePlaceAutocompleteHelper;
use Ivory\GoogleMap\Place\Autocomplete;
use Ivory\GoogleMapBundle\Templating\PlaceAutocompleteHelper;
use PHPUnit\Framework\TestCase;

class PlaceAutocompleteHelperTest extends TestCase
{
    private PlaceAutocompleteHelper $placeAutocompleteHelper;

    private BasePlaceAutocompleteHelper|MockObject $innerPlaceAutocompleteHelper;

    protected function setUp(): void
    {
        $this->innerPlaceAutocompleteHelper = $this->createPlaceAutocompleteHelperMock();
        $this->placeAutocompleteHelper = new PlaceAutocompleteHelper($this->innerPlaceAutocompleteHelper);
    }

    public function testRender()
    {
        $this->innerPlaceAutocompleteHelper
            ->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($autocomplete = $this->createAutocompleteMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $this->placeAutocompleteHelper->render($autocomplete));
    }

    public function testRenderHtml()
    {
        $this->innerPlaceAutocompleteHelper
            ->expects($this->once())
            ->method('renderHtml')
            ->with($this->identicalTo($autocomplete = $this->createAutocompleteMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $this->placeAutocompleteHelper->renderHtml($autocomplete));
    }

    public function testRenderJavascript()
    {
        $this->innerPlaceAutocompleteHelper
            ->expects($this->once())
            ->method('renderJavascript')
            ->with($this->identicalTo($autocomplete = $this->createAutocompleteMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $this->placeAutocompleteHelper->renderJavascript($autocomplete));
    }

    public function testName()
    {
        $this->assertSame('ivory_google_place_autocomplete', $this->placeAutocompleteHelper->getName());
    }

    private function createPlaceAutocompleteHelperMock(): MockObject|BasePlaceAutocompleteHelper
    {
        return $this->createMock(BasePlaceAutocompleteHelper::class);
    }

    private function createAutocompleteMock(): MockObject|Autocomplete
    {
        return $this->createMock(Autocomplete::class);
    }
}
