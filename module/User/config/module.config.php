<?php

namespace User;

return array(
    // Rotas
    'router' => array(
        'routes' => array(
            'home' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'Authentication',
                        'action'        => 'login',
                    )
                )
            ),
            'user' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/user',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // Rota padrão ZF1
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    )
                ),
            ),
            'login' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'Authentication',
                        'action'        => 'login',
                    )
                )
            ),
            'logout' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/logout',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'Authentication',
                        'action'        => 'logout',
                    )
                )
            ),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/user.phtml',
            'user/layout/partial/header' => __DIR__ . '/../view/layout/partial/header.phtml',
            'user/layout/partial/footer' => __DIR__ . '/../view/layout/partial/footer.phtml',
            'user/index/index' => __DIR__ . '/../view/user/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    // Define um layout diferente para este módulo
    'module_layouts' => array(
        'User' => 'layout/user.phtml',
    ),
    // Deixa os arquivos estaticos (assets) disponiveis no diretorio public.
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                __DIR__ . '/../public'
            ),
        )
    ),
    'doctrine' => array(
        'driver' => array(
            'user_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/User/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'User\Entity' => 'user_entities'
                )
            )
        )
    ),
    'acl' => array(
        'role' => array(
            'guest' => null,
            'driver' => null,
            'admin' => null,
        ),
        'resource' => array(
            'car' => null
        ),
        'deny' => array(
            array('guest', 'car', 'drive')
        ),
        'allow' => array(
            array('admin', null, null),
            array('driver', 'car', 'drive', new Permissions\DriverAssertion()),
        )
    ),
    'rbac' => array(
        'role' => array(
            'guest' => null,
            'driver' => null,
            'admin' => null,
        ),
        'granted' => array(
            array('admin' => 'drive'),
            //array('driver' => 'drive'),
        )
    ),
    'db' => array(
        'driver' => 'Mysqli',
        'database' => 'mbm',
        'username' => 'root',
        'password' => '123',
        'hostname' => '127.0.0.1',
        'port' => '3306',
        'charset' => 'utf8',
        'options' => array(
            'buffer_results' => 1
        )
    )
);
