<?php

namespace Bundle\TwigExtensionsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TwigExtensionsExtension extends Extension
{

    public function configLoad($config, ContainerBuilder $container)
    {
        if(empty($config['extensions'])) {
            $config['extensions'] = array('debug');
        }

        $loader = new XmlFileLoader($container, __DIR__.'/../Resources/config');
        foreach($config['extensions'] as $extensionName) {
            $loader->load(sprintf('%s.xml', $extensionName));
        }
    }

    /**
     * Returns the base path for the XSD files.
     *
     * @return string The XSD base path
     */
    public function getXsdValidationBasePath()
    {
        return null;
    }

    public function getNamespace()
    {
        return 'http://www.symfony-project.org/schema/dic/symfony';
    }

    public function getAlias()
    {
        return 'twig_extensions';
    }

}
