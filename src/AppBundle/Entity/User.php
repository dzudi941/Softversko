<?php
/**
 * Created by PhpStorm.
 * User: Stefan Zivic
 * Date: 2/20/2018
 * Time: 12:14 AM
 */
/*
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\GroupInterface;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
*/
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 *//*
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *//*
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="userEmail", type="string", length=255)
     * @ORM\ManyToOne(targetEntity="CalendarEvent", inversedBy="userEmail")
     *//*
    protected $userEmail;

    public function setUserEmail($email = null)
    {
        $this->userEmail = $email;

        return $this;
    }

    /**
     * Get user email.
     *
     * @return string|null
     *//*
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @return int
     *//*
    public function getGroupId()
    {
        if($this->groups != null)
            return $this->groups[0]->getId();
        else
            return -1;
    }

    public function __construct()
    {
        parent::__construct();
    }
}
*/