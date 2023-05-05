<?php


namespace Ivory\GoogleMapBundle\Twig;

use Ivory\GoogleMap\Helper\StaticMapHelper;
use Ivory\GoogleMap\Map;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class StaticMapExtension extends AbstractExtension
{
    public function __construct(private readonly StaticMapHelper $staticMapHelper)
    {
    }

    public function getFunctions(): array
    {
        $functions = [];

        foreach ($this->getMapping() as $name => $method) {
            $functions[] = new TwigFunction($name, [$this, $method], ['is_safe' => ['html']]);
        }

        return $functions;
    }

    /**
     * @return string
     */
    public function render(Map $map)
    {
        return $this->staticMapHelper->render($map);
    }

    public function getName(): string
    {
        return 'ivory_google_map_static';
    }

    /**
     * @return string[]
     */
    private function getMapping(): array
    {
        return ['ivory_google_map_static' => 'render'];
    }
}
