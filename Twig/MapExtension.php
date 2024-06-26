<?php


namespace Ivory\GoogleMapBundle\Twig;

use Ivory\GoogleMap\Helper\MapHelper;
use Ivory\GoogleMap\Map;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class MapExtension extends AbstractExtension
{
    public function __construct(private readonly MapHelper $mapHelper)
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

    public function render(Map $map, array $attributes = []): string
    {
        $map->addHtmlAttributes($attributes);

        return $this->mapHelper->render($map);
    }

    public function renderHtml(Map $map, array $attributes = []): string
    {
        $map->addHtmlAttributes($attributes);

        return $this->mapHelper->renderHtml($map);
    }

    public function renderStylesheet(Map $map): string
    {
        return $this->mapHelper->renderStylesheet($map);
    }

    public function renderJavascript(Map $map): string
    {
        return $this->mapHelper->renderJavascript($map);
    }

    public function getName(): string
    {
        return 'ivory_google_map';
    }

    private function getMapping(): array
    {
        return [
            'ivory_google_map'           => 'render',
            'ivory_google_map_container' => 'renderHtml',
            'ivory_google_map_css'       => 'renderStylesheet',
            'ivory_google_map_js'        => 'renderJavascript',
        ];
    }
}
