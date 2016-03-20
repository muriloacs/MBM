<?php

namespace User\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation as Form;
 
/**
 * @ORM\Entity(repositoryClass="Application\Repository\UserRepository") 
 * @ORM\Table(name="user")
 * @Form\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Form\Name("User")
 * @Form\Attributes({"method":"post"})
 * @Form\Attributes({"action":"/user/authentication/authenticate"})
 */
class User
{

    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /**
     * @ORM\Column(type="string") 
     * @Form\Type("Zend\Form\Element\Text")
     * @Form\Required({"required":"true" })
     * @Form\Filter({"name":"StripTags"})
     * @Form\Attributes({"placeholder":"email", "class": "form-control"})
     */
    public $email;
     
    /**
     * @ORM\Column(type="string")
     * @Form\Type("Zend\Form\Element\Password")
     * @Form\Required({"required":"true" })
     * @Form\Filter({"name":"StripTags"})
     * @Form\Attributes({"placeholder":"senha", "class": "form-control"})
     */
    public $password;
     
    /**
     * @Form\Type("Zend\Form\Element\Submit")
     * @Form\Attributes({"value":"Enviar", "class":"btn btn-primary"})
     */
    public $submit;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}