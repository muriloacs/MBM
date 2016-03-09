<?php
/**
 * Services configuration.
 */

namespace Application;

return array(
    'factories' => array(
        'Application\Service\UserService' => 'Application\Service\Factory\UserServiceFactory'
    ),

    'abstract_factories' => array(
        'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        'Zend\Log\LoggerAbstractServiceFactory',
    ),

    'aliases' => array(
        'translator' => 'MvcTranslator',
    ),
);
