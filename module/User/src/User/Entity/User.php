<?php

namespace User\Entity;
 
use Zend\Form\Annotation as Form;
 
/**
 * @Form\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Form\Name("User")
 * @Form\Attributes({"method":"post"})
 * @Form\Attributes({"action":"/user/authentication/authenticate"})
 */
class User
{
    /**
     * @Form\Type("Zend\Form\Element\Text")
     * @Form\Required({"required":"true" })
     * @Form\Filter({"name":"StripTags"})
     * @Form\Attributes({"placeholder":"usuário", "class": "form-control"})
     */
    public $username;
     
    /**
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
}