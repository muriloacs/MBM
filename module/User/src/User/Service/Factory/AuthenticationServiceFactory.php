<?php

namespace User\Service\Factory;

use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // Array com dados de conexão $config['db']
        $config = $serviceLocator->get('config');

        // Adapter de conexão
        $dbAdapter = new \Zend\Db\Adapter\Adapter($config['db']);	

        // Definindo autenticação por tabela de banco de dados
       	$adapter = new \Zend\Authentication\Adapter\DbTable($dbAdapter, 'mbm_user', 'username', 'password', 'MD5(?)');

        // Instaciando o serviço de autenticação
        $auth = new AuthenticationService();

        // Setando o adapter no serviço
        $auth->setAdapter($adapter);
        
        return $auth;
    }
}
