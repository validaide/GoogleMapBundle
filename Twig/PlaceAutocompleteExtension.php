<?php


namespace Ivory\GoogleMapBundle\Twig;

use Ivory\GoogleMap\Helper\PlaceAutocompleteHelper;
use Ivory\GoogleMap\Place\Autocomplete;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PlaceAutocompleteExtension extends AbstractExtension
{
    public function __construct(private readonly PlaceAutocompleteHelper $placeAutocompleteHelper)
    {
    }

    public function getFunctions(): array
    {
        $functions = [];

        foreach ($this->getMapping() as $name => $method) {
            $functions[] = new TwigFunction($name, [$this, $method], ['is_safe' => ['html']]);
        }

        return $functions;
    }

    /**
     * @param string[]     $attributes
     */
    public function render(Autocomplete $autocomplete, array $attributes = []): string
    {
        $autocomplete->addInputAttributes($attributes);

        return $this->placeAutocompleteHelper->render($autocomplete);
    }

    /**
     * @param string[]     $attributes
     * @return string
     */
    public function renderHtml(Autocomplete $autocomplete, array $attributes = []): string
    {
        $autocomplete->addInputAttributes($attributes);

        return $this->placeAutocompleteHelper->renderHtml($autocomplete);
    }

    public function renderJavascript(Autocomplete $autocomplete): string
    {
        return $this->placeAutocompleteHelper->renderJavascript($autocomplete);
    }

    public function getName(): string
    {
        return 'ivory_google_place_autocomplete';
    }

    /**
     * @return string[]
     */
    private function getMapping(): array
    {
        return [
            'ivory_google_place_autocomplete'           => 'render',
            'ivory_google_place_autocomplete_container' => 'renderHtml',
            'ivory_google_place_autocomplete_js'        => 'renderJavascript',
        ];
    }
}
