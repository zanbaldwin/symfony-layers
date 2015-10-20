<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // Framework Bundles.
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle,
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle,
            // Symfony Framework Second-party Bundles.
            new Symfony\Bundle\SecurityBundle\SecurityBundle,
            new Symfony\Bundle\TwigBundle\TwigBundle,
            new Symfony\Bundle\MonologBundle\MonologBundle,
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle,
            new Symfony\Bundle\AsseticBundle\AsseticBundle,

            // Doctrine Bundles.
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle,
            new Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle,
            // Content Repository Bundle.
            new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle,
            // Symfony CMF.
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle,
            new Symfony\Cmf\Bundle\RoutingAutoBundle\CmfRoutingAutoBundle,
            new Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle,
            new Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle,
            // CMF Menu Bundle and its dependencies.
            new Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle,
            new Knp\Bundle\MenuBundle\KnpMenuBundle,
            // CMF Block bundle and its dependencies.
            # new Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle,
            # new Sonata\CoreBundle\SonataCoreBundle,
            # new Sonata\BlockBundle\SonataBlockBundle,

            new FOS\UserBundle\FOSUserBundle,
            new AppBundle\AppBundle,
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
