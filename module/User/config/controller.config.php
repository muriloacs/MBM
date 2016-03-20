<?php

namespace User;

return array(
    'factories' => array(
        'User\Controller\Authentication' => 'User\Controller\Factory\AuthenticationControllerFactory',
        'User\Controller\User' => 'User\Controller\Factory\UserControllerFactory',
    ),
);
