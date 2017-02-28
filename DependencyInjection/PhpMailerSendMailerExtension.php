<?php

namespace PhpMailer\SendMailerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class PhpMailerSendMailerExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $container->setParameter('Host', $config['Host']);
        $container->setParameter('SMTPAuth', $config['SMTPAuth']);
        $container->setParameter('Username', $config['Username']);
        $container->setParameter('Password', $config['Password']);
        $container->setParameter('SMTPSecure', $config['SMTPSecure']);
        $container->setParameter('Port', $config['Port']);
        $container->setParameter('addAddress', $config['addAddress']);
        $container->setParameter('Subject', $config['Subject']);
        $container->setParameter('List', $config['List']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}


    
