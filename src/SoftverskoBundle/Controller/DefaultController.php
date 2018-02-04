<?php

namespace SoftverskoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/a")
     */
    public function indexAction()
    {
        return $this->render('@Softversko/Default/index.html.twig');
    }
}
