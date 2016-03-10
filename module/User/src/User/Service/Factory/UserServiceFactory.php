<?php

namespace User\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Permissions\Acl\Acl;

class UserServiceFactory implements FactoryInterface{
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
        // Configuração
        $config = $serviceLocator->get('config');
        
        // Auth
        $auth = $serviceLocator->get('auth');
    }

}