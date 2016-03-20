<?php

namespace User\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use User\Service\UserService;
 
class UserController extends AbstractActionController
{
    protected $userService;
    
    public function __construct(UserService $userService) 
    {
        $this->userService = $userService;
    }  
    
    public function loginAction()
    {
        $auth = $this->getServiceLocator()->get('authentication-service');

        if (!$auth->hasIdentity()) {
            return $this->redirect()->toUrl('/login');
        }

        $loggedIn = $this->userService->login();
        
        return array(
            'loggedIn'  => $loggedIn
        );
    }

    public function logoutAction()
    {
        $auth = $this->getServiceLocator()->get('authentication-service');

        if (!$auth->hasIdentity()) {
            return $this->redirect()->toUrl('/login');
        }

        $loggedOut = $this->userService->logout();
        
        return array(
            'loggedOut'  => $loggedOut
        );
    }
}
