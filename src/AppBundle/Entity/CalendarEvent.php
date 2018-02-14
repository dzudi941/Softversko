<?php

namespace AppBundle\Entity;

use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;

class CalendarEvent extends FullCalendarEvent

{
    // Your fields
    public function toArray()
    {
        // TODO: Implement toArray() method.
    }

    public function __construct($title, \DateTime $start)
    {
        parent::__construct($title, $start);
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


}
