<?php

namespace PhpMailer\SendMailerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('php_mailer_send_mailer');

        $rootNode
                   ->children()
                        ->scalarNode('Host')->defaultValue('smtp.gmail.com')->end()
                        ->scalarNode('SMTPAuth')->defaultValue(true)->end()
                        ->scalarNode('Username')->defaultValue('symfony.tutorials2017@gmail.com')->end()
                        ->scalarNode('Password')->defaultValue('symfony.tutorials2017symfony.tutorials2017')->end()
                        ->scalarNode('SMTPSecure')->defaultValue('tls')->end()
                        ->scalarNode('Port')->defaultValue(587)->end()
                        ->scalarNode('addAddress')->defaultValue('symfony.tutorials2017@gmail.com')->end()
                        ->scalarNode('Subject')->defaultValue('symfony.tutorials2017@gmail.com')->end()
                         ->arrayNode('List')
                                ->prototype('scalar')->end()
                                ->defaultValue(array())
                                ->end()
                
               ->end() ; 

        return $treeBuilder;
    }
}

