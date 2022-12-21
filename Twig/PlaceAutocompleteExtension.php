<?php


namespace Ivory\GoogleMapBundle\Twig;

use Ivory\GoogleMap\Helper\PlaceAutocompleteHelper;
use Ivory\GoogleMap\Place\Autocomplete;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PlaceAutocompleteExtension extends AbstractExtension
{
    private PlaceAutocompleteHelper $placeAutocompleteHelper;

    public function __construct(PlaceAutocompleteHelper $placeAutocompleteHelper)
    {
        $this->placeAutocompleteHelper = $placeAutocompleteHelper;
    }

    public function getFunctions()
    {
        $functions = [];

        foreach ($this->getMapping() as $name => $method) {
            $functions[] = new TwigFunction($name, [$this, $method], ['is_safe' => ['html']]);
        }

        return $functions;
    }

    /**
     * @param Autocomplete $autocomplete
     * @param string[]     $attributes
     *
     * @return string
     */
    public function render(Autocomplete $autocomplete, array $attributes = [])
    {
        $autocomplete->addInputAttributes($attributes);

        return $this->placeAutocompleteHelper->render($autocomplete);
    }

    /**
     * @param Autocomplete $autocomplete
     * @param string[]     $attributes
     *
     * @return string
     */
    public function renderHtml(Autocomplete $autocomplete, array $attributes = [])
    {
        $autocomplete->addInputAttributes($attributes);

        return $this->placeAutocompleteHelper->renderHtml($autocomplete);
    }

    /**
     * @param Autocomplete $autocomplete
     *
     * @return string
     */
    public function renderJavascript(Autocomplete $autocomplete)
    {
        return $this->placeAutocompleteHelper->renderJavascript($autocomplete);
    }

    public function getName()
    {
        return 'ivory_google_place_autocomplete';
    }

    /**
     * @return string[]
     */
    private function getMapping()
    {
        return [
            'ivory_google_place_autocomplete'           => 'render',
            'ivory_google_place_autocomplete_container' => 'renderHtml',
            'ivory_google_place_autocomplete_js'        => 'renderJavascript',
        ];
    }
}
