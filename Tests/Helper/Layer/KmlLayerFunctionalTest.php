<?php

/*
 * This file is part of the Ivory Google Map package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMapBundle\Tests\Helper\Layer;

use Ivory\GoogleMapBundle\Tests\Helper\HelperFactory;
use Ivory\Tests\GoogleMap\Helper\Functional\Layer\KmlLayerFunctionalTest as BaseKmlLayerFunctionalTest;

/**
 * @author GeLo <geloen.eric@gmail.com>
 *
 * @group functional
 */
class KmlLayerFunctionalTest extends BaseKmlLayerFunctionalTest
{
    protected function createApiHelper()
    {
        return HelperFactory::createApiHelper();
    }

    protected function createMapHelper()
    {
        return HelperFactory::createMapHelper();
    }
}
