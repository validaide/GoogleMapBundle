<?php

/*
 * This file is part of the Ivory Google Map package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMapBundle\Tests\Helper\Place;

use Ivory\GoogleMap\Helper\PlaceAutocompleteHelper;
use Ivory\GoogleMap\Helper\ApiHelper;
use Ivory\GoogleMapBundle\Tests\Helper\HelperFactory;
use Ivory\Tests\GoogleMap\Helper\Functional\Place\AutocompleteFunctionalTest as BaseAutocompleteFunctionalTest;

/**
 * @author GeLo <geloen.eric@gmail.com>
 *
 * @group  functional
 */
class AutocompleteFunctionalTest extends BaseAutocompleteFunctionalTest
{
    protected function createApiHelper(): ApiHelper
    {
        return HelperFactory::createApiHelper();
    }

    protected function createPlaceAutocompleteHelper(): PlaceAutocompleteHelper
    {
        return HelperFactory::createPlaceAutocompleteHelper();
    }
}
