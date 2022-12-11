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

use Ivory\GoogleMap\Helper\ApiHelper as BaseApiHelper;
use Symfony\Component\Templating\Helper\Helper;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class ApiHelper extends Helper
{
    public function __construct(private readonly BaseApiHelper $apiHelper)
    {
    }

    /**
     * @param object[] $objects
     *
     * @return string
     */
    public function render(array $objects)
    {
        return $this->apiHelper->render($objects);
    }

    public function getName()
    {
        return 'ivory_google_api';
    }
}
