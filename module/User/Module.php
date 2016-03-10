<?php

namespace User;

use Zend\Mvc\ModuleRouteListener;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature;

class Module implements
                Feature\BootstrapListenerInterface,
                Feature\ConfigProviderInterface,
                Feature\AutoloaderProviderInterface,
                Feature\ServiceProviderInterface,
                Feature\ControllerProviderInterface,
                Feature\ViewHelperProviderInterface
{
    public function onBootstrap(EventInterface $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return include __DIR__ . '/config/autoloader.config.php';
    }

    public function getServiceConfig()
    {
        return include __DIR__ . '/config/service.config.php';
    }
    
    public function getControllerConfig()
    {
        return include __DIR__ . '/config/controller.config.php';
    }
    
    public function getViewHelperConfig()
    {
        return include __DIR__ . '/config/view-helper.config.php';
    }
}
