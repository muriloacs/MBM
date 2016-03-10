<?php

namespace User\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Permissions\Acl\Acl;

class AclServiceFactory implements FactoryInterface{
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
        // Configuração
        $config = $serviceLocator->get('config');
        $aclConfig = $config['acl'];
        
        $acl = new Acl();
        // Roles
        foreach ($aclConfig['role'] as $role => $parent) {
            $acl->addRole($role, $parent);
        }
        // Resources
        foreach ($aclConfig['resource'] as $resource => $parent) {
            $acl->addResource($resource, $parent);
        }
        // Permissions
        foreach (array('allow','deny') as $action) {
            foreach ($aclConfig[$action] as $definition) {
                call_user_func_array( array($acl, $action), $definition );
            }
        }
        
        return $acl;
    }

}