<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\CalendarEvent as MyCustomEvent;

/**
 * Event controller.
 *
 * @Route("event")
 */
class EventController extends Controller
{
    var $month = 'February';
    /**
     * Lists all event entities.
     *
     * @Route("/", name="event_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        dump('a');
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('AppBundle:Event')->findAll();

        $date = '2017-12-06';
        // End date
        $end_date = '2018-4-31';
        $dates_array = [];
        while(strtotime($date) < strtotime($end_date))
        {
            $dates_array[] = $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
        }


        return $this->render('event/index.html.twig', array(
            'events' => $events,
            'dates_array' => array_reverse( $dates_array),
            'month' => $this->month
        ));
    }

    /**
     * Creates a new event entity.
     *
     * @Route("/new/{dateTime}", name="event_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $dateTime=null)
    {
        $event = new Event();
        $date = new \DateTime();
        $event->setCreateDate($date);

        if($dateTime!=null) {
            $a = explode('-',$dateTime);
            $newDate = new \DateTime();
            $newDate->setDate($a[0],$a[1],$a[2]);
            $event->setDate($newDate);
        }
        else
            $event->setDate($date );

        $form = $this->createForm('AppBundle\Form\EventType', $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('event_show', array('id' => $event->getId()));
        }

        return $this->render('event/new.html.twig', array(
            'event' => $event,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a event entity.
     *
     * @Route("/{id}", name="event_show")
     * @Method("GET")
     */
    public function showAction(Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);

        return $this->render('event/show.html.twig', array(
            'event' => $event,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing event entity.
     *
     * @Route("/{id}/edit", name="event_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);
        $editForm = $this->createForm('AppBundle\Form\EventType', $event);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('event_edit', array('id' => $event->getId()));
        }

        return $this->render('event/edit.html.twig', array(
            'event' => $event,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a event entity.
     *
     * @Route("/{id}", name="event_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Event $event)
    {
        $form = $this->createDeleteForm($event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($event);
            $em->flush();
        }

        return $this->redirectToRoute('event_index');
    }

    /**
     * Creates a form to delete a event entity.
     *
     * @param Event $event The event entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Event $event)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('event_delete', array('id' => $event->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @Route("/updateEventDate", name="update_event_date")
     * @Method("POST")
     */
    public function updateEventDateAction(Request $request)
    {
        if($request->request->get('updateDate'))
        {
            //dump($request);
            $em = $this->getDoctrine()->getManager();

            $event = $em->getRepository('AppBundle:Event')->find($request->request->get('updateDate')['id']);
            $newDate = new \DateTime($request->request->get('updateDate')['newDate']);
            $event->setDate($newDate);
            $em->flush();
        }

        dump("B");
        return  new JsonResponse("{a: 'a'}");
    }

    /**
     * @Route("/testCalendarEvent", name="test_calendar_event")
     * @Method("POST")
     */
    public function testCalendarEventAction(Request $request)
    {

        $ev = new MyCustomEvent('Event Title 2', new \DateTime(), new \DateTime("+ 1 day"));
        $ev2 = new MyCustomEvent('Event Title 4', new \DateTime(), new \DateTime("+ 1 day"));
        $evAr = [];
        $evAr[] = $ev;
        $evAr[] = $ev2;
        $data = json_encode($evAr);

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($data);
        $response->setStatusCode(200);

        return $response;
    }


}
