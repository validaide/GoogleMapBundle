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

use Ivory\GoogleMap\Helper\StaticMapHelper as BaseStaticMapHelper;
use Ivory\GoogleMap\Map;
use Symfony\Component\Templating\Helper\Helper;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class StaticMapHelper extends Helper
{
    public function __construct(private readonly BaseStaticMapHelper $staticMapHelper)
    {
    }

    public function render(Map $map): string
    {
        return $this->staticMapHelper->render($map);
    }

    public function getName(): string
    {
        return 'ivory_google_map_static';
    }
}