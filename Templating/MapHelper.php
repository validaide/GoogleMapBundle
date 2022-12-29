<?php


namespace Ivory\GoogleMapBundle\Templating;

use Ivory\GoogleMap\Helper\MapHelper as BaseMapHelper;
use Ivory\GoogleMap\Map;
use Symfony\Component\Templating\Helper\Helper;

class MapHelper extends Helper
{
    /**
     * @var BaseMapHelper
     */
    private BaseMapHelper $mapHelper;

    /**
     * @param BaseMapHelper $mapHelper
     */
    public function __construct(BaseMapHelper $mapHelper)
    {
        $this->mapHelper = $mapHelper;
    }

    /**
     * @param Map      $map
     * @param string[] $attributes
     *
     * @return string
     */
    public function render(Map $map, array $attributes = []): string
    {
        $map->addHtmlAttributes($attributes);

        return $this->mapHelper->render($map);
    }

    /**
     * @param Map      $map
     * @param string[] $attributes
     *
     * @return string
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
