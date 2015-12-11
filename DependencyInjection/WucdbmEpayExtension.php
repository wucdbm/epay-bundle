<?php

namespace Wucdbm\Bundle\EpayBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class WucdbmEpayExtension extends Extension {

    public function load(array $configs, ContainerBuilder $container) {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        $bag = $container->getParameterBag();

        $bag->set('wucdbm_epay.config', $config);

        $bag->set('wucdbm_epay.client_options', $config['client_options']);
        $bag->set('wucdbm_epay.client_handler', $config['client_handler']);

        $loader->load('services.xml');
    }

    public function getXsdValidationBasePath() {
        return __DIR__ . '/../Resources/config/';
    }

    public function getNamespace() {
        return 'http://www.example.com/symfony/schema/';
    }

}