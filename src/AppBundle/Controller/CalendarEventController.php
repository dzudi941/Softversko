<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CalendarEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Calendarevent controller.
 *
 * @Route("calendarevent")
 */
class CalendarEventController extends Controller
{
    /**
     * Lists all calendarEvent entities.
     *
     * @Route("/", name="calendarevent_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $calendarEvents = $em->getRepository('AppBundle:CalendarEvent')->findAll();
        $calendarEvent = new CalendarEvent();
        $form = $this->createForm('AppBundle\Form\CalendarEventType', $calendarEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($calendarEvent);
            $em->flush();

            return $this->redirectToRoute('calendarevent_show', array('id' => $calendarEvent->getId()));
        }

        return $this->render('calendarevent/index.html.twig', array(
            'calendarEvents' => $calendarEvents,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new calendarEvent entity.
     *
     * @Route("/new", name="calendarevent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $calendarEvent = new CalendarEvent();
        $form = $this->createForm('AppBundle\Form\CalendarEventType', $calendarEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($calendarEvent);
            $em->flush();

            return $this->redirectToRoute('calendarevent_show', array('id' => $calendarEvent->getId()));
        }

        return $this->render('calendarevent/new.html.twig', array(
            'calendarEvent' => $calendarEvent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a calendarEvent entity.
     *
     * @Route("/{id}", name="calendarevent_show")
     * @Method("GET")
     */
    public function showAction(CalendarEvent $calendarEvent)
    {
        $deleteForm = $this->createDeleteForm($calendarEvent);

        return $this->render('calendarevent/show.html.twig', array(
            'calendarEvent' => $calendarEvent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing calendarEvent entity.
     *
     * @Route("/{id}/edit", name="calendarevent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CalendarEvent $calendarEvent)
    {
        $deleteForm = $this->createDeleteForm($calendarEvent);
        $editForm = $this->createForm('AppBundle\Form\CalendarEventType', $calendarEvent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('calendarevent_edit', array('id' => $calendarEvent->getId()));
        }

        return $this->render('calendarevent/edit.html.twig', array(
            'calendarEvent' => $calendarEvent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a calendarEvent entity.
     *
     * @Route("/{id}", name="calendarevent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CalendarEvent $calendarEvent)
    {
        $form = $this->createDeleteForm($calendarEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($calendarEvent);
            $em->flush();
        }

        return $this->redirectToRoute('calendarevent_index');
    }

    /**
     * Creates a form to delete a calendarEvent entity.
     *
     * @param CalendarEvent $calendarEvent The calendarEvent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CalendarEvent $calendarEvent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('calendarevent_delete', array('id' => $calendarEvent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @Route("/loadCalendarEvent", name="load_calendar_event")
     * @Method("POST")
     */
    public function loadCalendarEventAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('SELECT e FROM AppBundle:CalendarEvent e WHERE e.start > :starDate AND e.start < :endDate');
        $query->setParameters(array(
            'starDate' => new \DateTime($request->get('start')),
            'endDate' => new \DateTime($request->get('end'))
            ));
        $calendarEvents = $query->getResult();
        //$calendarEvents //= $em->getRepository('AppBundle:CalendarEvent')->findAll();
        //dump(array('debug'=>$calendarEvents[0]->getStart()->getTimezone(), 'serverTz' => (new \DateTime())->getTimezone()));
        $calendarEventsArray = [];
        foreach ($calendarEvents as $calendarEvent) {
            $calendarEventsArray[] = $calendarEvent->toArray();
        }
        $data = json_encode($calendarEventsArray);

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($data);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/newCalendarEvent", name="new_calendar_event")
     * @Method("POST")
     */
    public function newCalendarEventAction(Request $request)
    {
        $calendarEvent = new CalendarEvent();
        $calendarEvent->fromArray($request->get('newEvent'));
        //$e = $request->get('newEvent');
        //$timeFrom = $e['usr_time_from'];
        //$timeTo = $e['usr_time_to'];
        //$timeFrom_array = explode(":",$timeFrom);
       // $calendarEvent->getStart()->setTime($timeFrom_array[0],$timeFrom_array[1]);
        //$timeTo_array = explode(":",$timeTo);
        //$calendarEvent->getEnd()->setTime($timeTo_array[0],$timeTo_array[1]);

        $em = $this->getDoctrine()->getManager();
        $em->persist($calendarEvent);
        $em->flush();



        dump(array('result' => $calendarEvent));

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent("{'success': true}");
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/editCalendarEvent", name="edit_calendar_event")
     * @Method("POST")
     */
    public  function editCalendarEvent(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $calendarEvent = new CalendarEvent();
        $calendarEvent->setId($request->get('editEvent')['entityId']);
        $calendarEvent->fromArray($request->get('editEvent'));
        $em->merge($calendarEvent);
        $em->flush();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent("{'success': true}");
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/deleteCalendarEvent", name="delete_calendar_event")
     * @Method("POST")
     */
    public function deleteCalendarEvent(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $calendarEvent = $em->getRepository('AppBundle:CalendarEvent')->find($request->get('entityId'));
        $em->remove($calendarEvent);
        $em->flush();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent("{'success': true}");
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/currentCalendarEvent", name= "current_calendar_event")
     * @Method("POST")
     */
    public function currentDayCalendarEvent(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT e FROM AppBundle:CalendarEvent e WHERE e.start >= :starDate AND e.start < :endDate');
        $query->setParameters(array(
            'starDate' => new \DateTime("-1 day"),
            'endDate' => new \DateTime("+ 1 day")
        ));
        $calendarEvents = $query->getResult();
        dump(array('debug'=>$calendarEvents));
        $result = [];
        foreach ($calendarEvents as $calendarEvent)
        {
            $result[] = $calendarEvent->toArray();
        }
        $data = json_encode($result);

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($data);
        $response->setStatusCode(200);

        return $response;
    }

}
