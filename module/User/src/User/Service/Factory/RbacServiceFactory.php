<?php

namespace User\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Permissions\Rbac\Rbac;

class RbacServiceFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        // Configuração
        $config = $serviceLocator->get('config');
        $rbacConfig = $config['rbac'];

        $rbac = new Rbac();
        // Roles
        foreach ($rbacConfig['role'] as $role => $parent) {
            $rbac->addRole($role, $parent);
        }
        // Resources
        foreach ($rbacConfig['granted'] as $granted) {
            foreach ($granted as $role => $action) {
                $role = $rbac->getRole($role);
                $role->addPermission($action);
            }
        }

        return $rbac;
    }

}
