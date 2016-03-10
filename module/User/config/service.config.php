<?php

return array(
    'factories' => array(
        'User\Service\AuthenticationService' => 'User\Service\Factory\AuthenticationServiceFactory',
        'User\Service\AclService' => 'User\Service\Factory\AclServiceFactory',
        'User\Service\RbacService' => 'User\Service\Factory\RbacServiceFactory'
    ),
    'aliases' => array(
        'authentication-service' => 'User\Service\AuthenticationService',
        'acl-service' => 'User\Service\AclService',
        'rbac-service' => 'User\Service\RbacService'
    )
);
