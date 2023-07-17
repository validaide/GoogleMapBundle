<?php


namespace Ivory\GoogleMapBundle\Templating;

use Ivory\GoogleMap\Helper\MapHelper as BaseMapHelper;
use Ivory\GoogleMap\Map;
use Symfony\Component\Templating\Helper\Helper;

class MapHelper extends Helper
{
    public function __construct(private readonly BaseMapHelper $mapHelper)
    {
    }

    /**
     * @param string[] $attributes
     */
    public function render(Map $map, array $attributes = []): string
    {
        $map->addHtmlAttributes($attributes);

        return $this->mapHelper->render($map);
    }

    /**
     * @param string[] $attributes
     */
    public function renderHtml(Map $map, array $attributes = []): string
    {
        $map->addHtmlAttributes($attributes);

        return $this->mapHelper->renderHtml($map);
    }

    /**
     * @param Map $map
     *
     * @return string
     */
    public function renderStylesheet(Map $map): string
    {
        return $this->mapHelper->renderStylesheet($map);
    }

    /**
     * @param Map $map
     *
     * @return string
     */
    public function renderJavascript(Map $map): string
    {
        return $this->mapHelper->renderJavascript($map);
    }

    public function getName(): string
    {
        return 'ivory_google_map';
    }
}
