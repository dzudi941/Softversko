<?php
/**
 * Created by PhpStorm.
 * User: Stefan Zivic
 * Date: 2/13/2018
 * Time: 11:44 PM
 */

namespace AppBundle\Listener;

use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;
use AppBundle\Entity\CalendarEvent;

class LoadDataListener
{
    /**
     * @param CalendarEvent $calendarEvent
     *
     */
    public function loadData(CalendarEvent $calendarEvent)
    {
        $startDate = $calendarEvent->getStartDate();

        $calendarEvent->addEvent(new CalendarEvent('Event Title 2', new \DateTime()));
    }
}