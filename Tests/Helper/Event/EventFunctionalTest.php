<?php

/*
 * This file is part of the Ivory Google Map package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMap\Tests\Helper\Event;

use Ivory\GoogleMapBundle\Tests\Helper\HelperFactory;
use Ivory\Tests\GoogleMap\Helper\Functional\Event\EventFunctionalTest as BaseEventFunctionalTest;

/**
 * @author GeLo <geloen.eric@gmail.com>
 *
 * @group functional
 */
class EventFunctionalTest extends BaseEventFunctionalTest
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
