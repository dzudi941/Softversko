<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BlogPost;
//use Doctrine\DBAL\Types\TextType;
use AppBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class EventController extends Controller
{
    /**
     * @Route("/events/add", name="events_add")
     */
    public function addEventAction(Request $request)
    {
        $event = new Event();
        $form = $this -> createFormBuilder($event)
            -> add('name',TextType::class,array('attr' => array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            -> add('category',TextType::class,array('attr' => array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            -> add('description',TextareaType::class,array('attr' => array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            -> add('priority',ChoiceType::class,array('choices' => array('Low' => 'Low', 'Normal'=>'Normal','High'=>'High'),'attr' => array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            -> add('date',DateTimeType::class,array('attr' => array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            die('Submitted');
        }
        return $this->render('events/create.html.twig',array('form'=>$form->createView()));
    }
}
