<?php

/*
 * This file is part of the Ivory Google Map package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMapBundle\Tests\Helper\Control;

use Ivory\GoogleMap\Helper\MapHelper;
use Ivory\GoogleMap\Helper\ApiHelper;
use Ivory\GoogleMapBundle\Tests\Helper\HelperFactory;
use Ivory\Tests\GoogleMap\Helper\Functional\Control\ScaleControlFunctionalTest as BaseScaleControlFunctionalTest;

/**
 * @author GeLo <geloen.eric@gmail.com>
 *
 * @group functional
 */
class ScaleControlFunctionalTest extends BaseScaleControlFunctionalTest
{
    protected function createApiHelper(): ApiHelper
    {
        return HelperFactory::createApiHelper();
    }

    protected function createMapHelper(): MapHelper
    {
        return HelperFactory::createMapHelper();
    }
}
