<?php

namespace User\Permissions;

use Zend\Permissions\Acl\Assertion\AssertionInterface;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\RoleInterface;
use Zend\Permissions\Acl\Resource\ResourceInterface;

class DriverAssertion implements AssertionInterface{
    
    public function assert(Acl $acl, RoleInterface $role = null, ResourceInterface $resource = null, $privilege = null) {
        return $this->areYouDriver();
    }
    
    protected function areYouDriver(){
        return true;
    }

}

