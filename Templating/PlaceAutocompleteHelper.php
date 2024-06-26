<?php


namespace Ivory\GoogleMapBundle\Templating;

use Ivory\GoogleMap\Helper\PlaceAutocompleteHelper as BasePlaceAutocompleteHelper;
use Ivory\GoogleMap\Place\Autocomplete;
use Symfony\Component\Templating\Helper\Helper;

class PlaceAutocompleteHelper extends Helper
{
    public function __construct(private readonly BasePlaceAutocompleteHelper $placeAutocompleteHelper)
    {
    }

    /**
     * @param string[] $attributes
     */
    public function render(Autocomplete $autocomplete, array $attributes = []): string
    {
        $autocomplete->addInputAttributes($attributes);

        return $this->placeAutocompleteHelper->render($autocomplete);
    }

    /**
     * @param string[] $attributes
     */
    public function renderHtml(Autocomplete $autocomplete, array $attributes = []): string
    {
        $autocomplete->addInputAttributes($attributes);

        return $this->placeAutocompleteHelper->renderHtml($autocomplete);
    }

    /**
     * @param Autocomplete $autocomplete
     *
     * @return string
     */
    public function renderJavascript(Autocomplete $autocomplete): string
    {
        return $this->placeAutocompleteHelper->renderJavascript($autocomplete);
    }

    public function getName(): string
    {
        return 'ivory_google_place_autocomplete';
    }
}
