<?php

/*
 * This file is part of the Ivory Google Map bundle package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMapBundle\Templating;

use Ivory\GoogleMap\Helper\MapHelper as BaseMapHelper;
use Ivory\GoogleMap\Map;
use Symfony\Component\Templating\Helper\Helper;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class MapHelper extends Helper
{
    public function __construct(private readonly BaseMapHelper $mapHelper)
    {
    }

    /**
     * @param string[] $attributes
     * @return string
     */
    public function render(Map $map, array $attributes = [])
    {
        $map->addHtmlAttributes($attributes);

        return $this->mapHelper->render($map);
    }

    /**
     * @param string[] $attributes
     * @return string
     */
    public function renderHtml(Map $map, array $attributes = [])
    {
        $map->addHtmlAttributes($attributes);

        return $this->mapHelper->renderHtml($map);
    }

    /**
     * @return string
     */
    public function renderStylesheet(Map $map)
    {
        return $this->mapHelper->renderStylesheet($map);
    }

    /**
     * @return string
     */
    public function renderJavascript(Map $map)
    {
        return $this->mapHelper->renderJavascript($map);
    }

    public function getName()
    {
        return 'ivory_google_map';
    }
}
