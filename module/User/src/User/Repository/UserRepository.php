<?php

namespace User\Repository;

use Doctrine\ORM\EntityRepository;
use User\Entity\User;

class UserRepository extends EntityRepository
{
    public function insert(User $user)
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush($user);
    }
    
    public function delete(User $user)
    {
        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush($user);
    }
    
    public function update(User $user)
    {
        $this->getEntityManager()->flush($user);
    }
}
