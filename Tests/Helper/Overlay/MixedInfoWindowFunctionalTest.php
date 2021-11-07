<?php

/*
 * This file is part of the Ivory Google Map package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMapBundle\Tests\Helper\Overlay;

use Ivory\GoogleMapBundle\Tests\Helper\HelperFactory;
use Ivory\Tests\GoogleMap\Helper\Functional\Overlay\MixedInfoWindowFunctionalTest as BaseMixedInfoWindowFunctionalTest;

/**
 * @author GeLo <geloen.eric@gmail.com>
 *
 * @group functional
 */
class MixedInfoWindowFunctionalTest extends BaseMixedInfoWindowFunctionalTest
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
