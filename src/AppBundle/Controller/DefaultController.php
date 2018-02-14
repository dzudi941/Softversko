<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/draggable/", name="draggable")
     */
    public  function  draggableAction(Request $request)
    {
        return $this->render('default/draggable.html.twig');
    }

    /**
     * @Route("/calendar/", name="calendar")
     */
    public  function  calendarAction(Request $request)
    {
        return $this->render('default/calendar.html.twig');
    }
}
