<?php


namespace Ivory\GoogleMapBundle\Templating;

use Ivory\GoogleMap\Helper\ApiHelper as BaseApiHelper;
use Symfony\Component\Templating\Helper\Helper;

class ApiHelper extends Helper
{
    /**
     * @var BaseApiHelper
     */
    private BaseApiHelper $apiHelper;

    /**
     * @param BaseApiHelper $apiHelper
     */
    public function __construct(BaseApiHelper $apiHelper)
    {
        $this->apiHelper = $apiHelper;
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
