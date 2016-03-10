<?php

namespace User\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\AuthenticationService;
use Zend\Form\Form;
 
class AuthenticationController extends AbstractActionController
{
    protected $authService;
    protected $form;
    
    public function __construct(AuthenticationService $authService, Form $form) 
    {
        $this->authService = $authService;
        $this->form = $form;
    }
     
    public function loginAction()
    {
        $url = $this->params()->fromQuery('go');
        $url = (!$url) ? '/' : $this->params()->fromQuery('go');
        
        if ($this->authService->hasIdentity()) {
            return $this->redirect()->toUrl($url);
        }
                 
        return array(
            'form'      => $this->form,
            'url'       => $url,
            'messages'  => $this->flashmessenger()->getMessages()
        );
    }
    
    public function logoutAction()
    {
        $this->authService->clearIdentity();
        $this->flashmessenger()->addMessage("You've been logged out");
        $url = $this->params()->fromQuery('go');
        
        return $this->redirect()->toUrl("/login?go=$url");
    }
     
    public function authenticateAction()
    {
        $request = $this->getRequest();
        $url = $this->params()->fromQuery('go');
        
        if ($request->isPost()) {
            $this->form->setData($request->getPost());
            if ($this->form->isValid()) {
                //check authentication...
                $this->authService->getAdapter()
                                        ->setIdentity($request->getPost('username'))
                                        ->setCredential($request->getPost('password'));
                                        
                $result = $this->authService->authenticate();
                foreach($result->getMessages() as $message) {
                    //save message temporary into flashmessenger
                    $this->flashmessenger()->addMessage($message);
                }
                 
                if ($result->isValid()) {
                    $this->authService->getStorage()->write($request->getPost('username'));
                    return $this->redirect()->toUrl($url);
                }
            }
        }

        return $this->redirect()->toUrl("/user/authentication/login?go=$url");
    }
}
