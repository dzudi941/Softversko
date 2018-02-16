<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalendarEvent
 *
 * @ORM\Table(name="calendar_event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CalendarEventRepository")
 */
class CalendarEvent
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="allDay", type="boolean", nullable=true)
     */
    private $allDay;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end", type="datetime", nullable=true)
     */
    private $end;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="className", type="string", length=255, nullable=true)
     */
    private $className;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="editable", type="boolean", nullable=true)
     */
    private $editable;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="startEditable", type="boolean", nullable=true)
     */
    private $startEditable;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="durationEditable", type="boolean", nullable=true)
     */
    private $durationEditable;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="resourceEditable", type="boolean", nullable=true)
     */
    private $resourceEditable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rendering", type="string", length=255, nullable=true)
     */
    private $rendering;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="overlap", type="boolean", nullable=true)
     */
    private $overlap;

    /**
     * @var string|null
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var string|null
     *
     * @ORM\Column(name="backgroundColor", type="string", length=255, nullable=true)
     */
    private $backgroundColor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="borderColor", type="string", length=255, nullable=true)
     */
    private $borderColor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="textColor", type="string", length=255, nullable=true)
     */
    private $textColor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


    /**
     * Set id.
     *
     * @param int $id
     *
     * @return CalendarEvent
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return CalendarEvent
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set allDay.
     *
     * @param bool|null $allDay
     *
     * @return CalendarEvent
     */
    public function setAllDay($allDay = null)
    {
        $this->allDay = $allDay;

        return $this;
    }

    /**
     * Get allDay.
     *
     * @return bool|null
     */
    public function getAllDay()
    {
        return $this->allDay;
    }

    /**
     * Set start.
     *
     * @param \DateTime $start
     *
     * @return CalendarEvent
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start.
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end.
     *
     * @param \DateTime|null $end
     *
     * @return CalendarEvent
     */
    public function setEnd($end = null)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end.
     *
     * @return \DateTime|null
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set url.
     *
     * @param string|null $url
     *
     * @return CalendarEvent
     */
    public function setUrl($url = null)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set className.
     *
     * @param string|null $className
     *
     * @return CalendarEvent
     */
    public function setClassName($className = null)
    {
        $this->className = $className;

        return $this;
    }

    /**
     * Get className.
     *
     * @return string|null
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Set editable.
     *
     * @param bool|null $editable
     *
     * @return CalendarEvent
     */
    public function setEditable($editable = null)
    {
        $this->editable = $editable;

        return $this;
    }

    /**
     * Get editable.
     *
     * @return bool|null
     */
    public function getEditable()
    {
        return $this->editable;
    }

    /**
     * Set startEditable.
     *
     * @param bool|null $startEditable
     *
     * @return CalendarEvent
     */
    public function setStartEditable($startEditable = null)
    {
        $this->startEditable = $startEditable;

        return $this;
    }

    /**
     * Get startEditable.
     *
     * @return bool|null
     */
    public function getStartEditable()
    {
        return $this->startEditable;
    }

    /**
     * Set durationEditable.
     *
     * @param bool|null $durationEditable
     *
     * @return CalendarEvent
     */
    public function setDurationEditable($durationEditable = null)
    {
        $this->durationEditable = $durationEditable;

        return $this;
    }

    /**
     * Get durationEditable.
     *
     * @return bool|null
     */
    public function getDurationEditable()
    {
        return $this->durationEditable;
    }

    /**
     * Set resourceEditable.
     *
     * @param bool|null $resourceEditable
     *
     * @return CalendarEvent
     */
    public function setResourceEditable($resourceEditable = null)
    {
        $this->resourceEditable = $resourceEditable;

        return $this;
    }

    /**
     * Get resourceEditable.
     *
     * @return bool|null
     */
    public function getResourceEditable()
    {
        return $this->resourceEditable;
    }

    /**
     * Set rendering.
     *
     * @param string|null $rendering
     *
     * @return CalendarEvent
     */
    public function setRendering($rendering = null)
    {
        $this->rendering = $rendering;

        return $this;
    }

    /**
     * Get rendering.
     *
     * @return string|null
     */
    public function getRendering()
    {
        return $this->rendering;
    }

    /**
     * Set overlap.
     *
     * @param bool|null $overlap
     *
     * @return CalendarEvent
     */
    public function setOverlap($overlap = null)
    {
        $this->overlap = $overlap;

        return $this;
    }

    /**
     * Get overlap.
     *
     * @return bool|null
     */
    public function getOverlap()
    {
        return $this->overlap;
    }

    /**
     * Set color.
     *
     * @param string|null $color
     *
     * @return CalendarEvent
     */
    public function setColor($color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color.
     *
     * @return string|null
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set backgroundColor.
     *
     * @param string|null $backgroundColor
     *
     * @return CalendarEvent
     */
    public function setBackgroundColor($backgroundColor = null)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Get backgroundColor.
     *
     * @return string|null
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * Set borderColor.
     *
     * @param string|null $borderColor
     *
     * @return CalendarEvent
     */
    public function setBorderColor($borderColor = null)
    {
        $this->borderColor = $borderColor;

        return $this;
    }

    /**
     * Get borderColor.
     *
     * @return string|null
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }

    /**
     * Set textColor.
     *
     * @param string|null $textColor
     *
     * @return CalendarEvent
     */
    public function setTextColor($textColor = null)
    {
        $this->textColor = $textColor;

        return $this;
    }

    /**
     * Get textColor.
     *
     * @return string|null
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return CalendarEvent
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }




    public function toArray()
    {
        $result = array();
        $result['entityId'] = $this->getId();
        $result['title'] = $this->getTitle();
        $result['start'] =  $this->getStart()->format(\DateTime::ATOM);

        if($this->getAllDay() != null)
            $result['allDay'] = $this->getAllDay();
        if($this->getEnd()!=null)
            $result['end'] = $this->getEnd()->format(\DateTime::ATOM);
        if($this->getUrl()!=null)
            $result['url'] = $this->getUrl();
        if($this->getClassName()!=null)
            $result['className'] = $this->getClassName();
        if($this->getEditable()!=null)
            $result['editable'] = $this->getEditable();
        if($this->getStartEditable()!=null)
            $result['startEditable'] = $this->getStartEditable();
        if($this->getDurationEditable()!=null)
            $result['durationEditable'] = $this->getDurationEditable();
        if($this->getResourceEditable()!=null)
            $result['resourceEditable'] = $this->getResourceEditable();
        if($this->getRendering()!=null)
            $result['rendering'] = $this->getRendering();
        if($this->getOverlap()!=null)
            $result['overlap'] = $this->getOverlap();
        if($this->getColor()!=null)
            $result['color'] = $this->getColor();
        if($this->getBackgroundColor()!=null)
            $result['backgroundColor'] = $this->getBackgroundColor();
        if($this->getBorderColor()!=null)
            $result['borderColor'] = $this->getBorderColor();
        if($this->getTextColor()!=null)
            $result['textColor'] = $this->getTextColor();
        if($this->getDescription()!=null)
        $result['description'] = $this->getDescription();

        return $result;
    }

    public function fromArray(array $inArray)
    {
        $this->setTitle($inArray['title']);
        $this->setStart(new \DateTime($inArray['start']));

        if(array_key_exists('allDay', $inArray))
            $this->setAllDay($inArray['allDay']);
        if(array_key_exists('end', $inArray))
            $this->setEnd(new \DateTime($inArray['end']));
        if(array_key_exists('url', $inArray))
            $this->setUrl($inArray['url']);
        if(array_key_exists('className', $inArray))
            $this->setClassName($inArray['className']);
        if(array_key_exists('editable', $inArray))
            $this->setEditable($inArray['editable']);
        if(array_key_exists('startEditable', $inArray))
            $this->setStartEditable($inArray['startEditable']);
        if(array_key_exists('durationEditable', $inArray))
            $this->setDurationEditable($inArray['durationEditable']);
        if(array_key_exists('resourceEditable', $inArray))
            $this->setResourceEditable($inArray['resourceEditable']);
        if(array_key_exists('rendering', $inArray))
            $this->setRendering($inArray['rendering']);
        if(array_key_exists('overlap', $inArray))
            $this->setOverlap($inArray['overlap']);
        if(array_key_exists('color', $inArray))
            $this->setColor($inArray['color']);
        if(array_key_exists('backgroundColor', $inArray))
            $this->setBackgroundColor($inArray['backgroundColor']);
        if(array_key_exists('borderColor', $inArray))
            $this->setBorderColor($inArray['borderColor']);
        if(array_key_exists('textColor', $inArray))
            $this->setTextColor($inArray['textColor']);
        if(array_key_exists('description', $inArray))
            $this->setDescription($inArray['description']);

        return $this;
    }
}
