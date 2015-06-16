<?php

namespace Checkdomain\TeleCashBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class CheckdomainTeleCashExtension
 */
class CheckdomainTeleCashExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $container->setParameter('checkdomain_tele_cash.service_url', $config['service_url']);

        $container->setParameter('checkdomain_tele_cash.api.user', $config['api']['user']);
        $container->setParameter('checkdomain_tele_cash.api.pass', $config['api']['pass']);

        $container->setParameter('checkdomain_tele_cash.client_cert_path', $config['client_cert_path']);

        $container->setParameter('checkdomain_tele_cash.client_key.path', $config['client_key']['path']);
        $container->setParameter('checkdomain_tele_cash.client_key.pass_phrase', $config['client_key']['pass_phrase']);

        $container->setParameter('checkdomain_tele_cash.server_cert_path', $config['server_cert_path']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

}
