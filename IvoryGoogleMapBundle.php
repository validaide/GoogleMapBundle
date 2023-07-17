<?php


namespace Ivory\GoogleMapBundle;

use Ivory\GoogleMapBundle\DependencyInjection\Compiler\CleanTemplatingPass;
use Ivory\GoogleMapBundle\DependencyInjection\Compiler\RegisterControlRendererPass;
use Ivory\GoogleMapBundle\DependencyInjection\Compiler\RegisterExtendableRendererPass;
use Ivory\GoogleMapBundle\DependencyInjection\Compiler\RegisterFormResourcePass;
use Ivory\GoogleMapBundle\DependencyInjection\Compiler\RegisterHelperListenerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class IvoryGoogleMapBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container
            ->addCompilerPass(new CleanTemplatingPass(), \Symfony\Component\DependencyInjection\Compiler\PassConfig::TYPE_BEFORE_OPTIMIZATION, 0)
            ->addCompilerPass(new RegisterControlRendererPass(), \Symfony\Component\DependencyInjection\Compiler\PassConfig::TYPE_BEFORE_OPTIMIZATION, 0)
            ->addCompilerPass(new RegisterExtendableRendererPass(), \Symfony\Component\DependencyInjection\Compiler\PassConfig::TYPE_BEFORE_OPTIMIZATION, 0)
            ->addCompilerPass(new RegisterFormResourcePass(), \Symfony\Component\DependencyInjection\Compiler\PassConfig::TYPE_BEFORE_OPTIMIZATION, 0)
            ->addCompilerPass(new RegisterHelperListenerPass(), \Symfony\Component\DependencyInjection\Compiler\PassConfig::TYPE_BEFORE_OPTIMIZATION, 0);
    }
}
