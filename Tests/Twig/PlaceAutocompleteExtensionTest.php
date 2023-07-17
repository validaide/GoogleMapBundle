<?php


namespace Ivory\GoogleMapBundle\Tests\Twig;

use PHPUnit\Framework\MockObject\MockObject;
use Ivory\GoogleMap\Helper\PlaceAutocompleteHelper;
use Ivory\GoogleMap\Place\Autocomplete;
use Ivory\GoogleMapBundle\Twig\PlaceAutocompleteExtension;
use Twig\Extension\AbstractExtension;

class PlaceAutocompleteExtensionTest extends AbstractExtensionTest
{
    /**
     * @var PlaceAutocompleteHelper|MockObject|null
     */
    private PlaceAutocompleteHelper|MockObject|null $placeAutocompleteHelper = null;

    protected function createExtension(): AbstractExtension
    {
        $this->placeAutocompleteHelper = $this->createPlaceAutocompleteHelperMock();

        return new PlaceAutocompleteExtension($this->placeAutocompleteHelper);
    }

    public function testRender()
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_place_autocomplete(autocomplete) }}');

        $this->placeAutocompleteHelper
            ->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($autocomplete = $this->createAutocompleteMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['autocomplete' => $autocomplete]));
    }

    public function testRenderHtml()
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_place_autocomplete_container(autocomplete) }}');

        $this->placeAutocompleteHelper
            ->expects($this->once())
            ->method('renderHtml')
            ->with($this->identicalTo($autocomplete = $this->createAutocompleteMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['autocomplete' => $autocomplete]));
    }

    public function testRenderJavascript()
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_place_autocomplete_js(autocomplete) }}');

        $this->placeAutocompleteHelper
            ->expects($this->once())
            ->method('renderJavascript')
            ->with($this->identicalTo($autocomplete = $this->createAutocompleteMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['autocomplete' => $autocomplete]));
    }

    private function createPlaceAutocompleteHelperMock(): MockObject|PlaceAutocompleteHelper
    {
        return $this->createMock(PlaceAutocompleteHelper::class);
    }

    private function createAutocompleteMock(): MockObject|Autocomplete
    {
        return $this->createMock(Autocomplete::class);
    }
}
