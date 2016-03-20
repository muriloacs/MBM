<?php

namespace User\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Di\Di;
use User\Entity\User;
use Zend\Form\Annotation\AnnotationBuilder;

class AuthenticationControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        // Setting dependencies
        $serviceLocator = $serviceManager->getServiceLocator();
        $authService = $serviceLocator->get('authentication-service');
        
        $user       = new User();
        $builder    = new AnnotationBuilder();
        $form = $builder->createForm($user);

        // Injecting dependencies
        $di = new Di();
        $di->instanceManager()->setParameters('User\Controller\AuthenticationController', array(
            'authService' => $authService,
            'form' => $form
        ));

        // Returning instance
        return $di->get('User\Controller\AuthenticationController');
    }
}
