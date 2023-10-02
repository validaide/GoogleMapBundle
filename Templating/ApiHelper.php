<?php


namespace Ivory\GoogleMapBundle\Templating;

use Ivory\GoogleMap\Helper\ApiHelper as BaseApiHelper;
use Symfony\Component\Templating\Helper\Helper;

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
    public function render(array $objects): string
    {
        return $this->apiHelper->render($objects);
    }

    public function getName(): string
    {
        return 'ivory_google_api';
    }
}
