<?php


namespace Ivory\GoogleMapBundle\Templating;

use Ivory\GoogleMap\Helper\StaticMapHelper as BaseStaticMapHelper;
use Ivory\GoogleMap\Map;
use Symfony\Component\Templating\Helper\Helper;

class StaticMapHelper extends Helper
{
    /**
     * @var BaseStaticMapHelper
     */
    private BaseStaticMapHelper $staticMapHelper;

    /**
     * @param BaseStaticMapHelper $staticMapHelper
     */
    public function __construct(BaseStaticMapHelper $staticMapHelper)
    {
        $this->staticMapHelper = $staticMapHelper;
    }

    /**
     * @param Map $map
     *
     * @return string
     */
    public function render(Map $map): string
    {
        return $this->staticMapHelper->render($map);
    }

    public function getName(): string
    {
        return 'ivory_google_map_static';
    }
}
