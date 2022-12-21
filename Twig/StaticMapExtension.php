<?php


namespace Ivory\GoogleMapBundle\Twig;

use Ivory\GoogleMap\Helper\StaticMapHelper;
use Ivory\GoogleMap\Map;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class StaticMapExtension extends AbstractExtension
{
    private StaticMapHelper $staticMapHelper;

    /**
     * @param StaticMapHelper $staticMapHelper
     */
    public function __construct(StaticMapHelper $staticMapHelper)
    {
        $this->staticMapHelper = $staticMapHelper;
    }

    public function getFunctions()
    {
        $functions = [];

        foreach ($this->getMapping() as $name => $method) {
            $functions[] = new TwigFunction($name, [$this, $method], ['is_safe' => ['html']]);
        }

        return $functions;
    }

    /**
     * @param Map $map
     *
     * @return string
     */
    public function render(Map $map)
    {
        return $this->staticMapHelper->render($map);
    }

    public function getName()
    {
        return 'ivory_google_map_static';
    }

    /**
     * @return string[]
     */
    private function getMapping()
    {
        return ['ivory_google_map_static' => 'render'];
    }
}
