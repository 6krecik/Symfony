<?php

namespace TorBundle\EventListener;

use ADesigns\CalendarBundle\Event\CalendarEvent;
use ADesigns\CalendarBundle\Entity\EventEntity;
use Doctrine\ORM\EntityManager;

class CalendarEventListener
{
private $entityManager;

public function __construct(EntityManager $entityManager)
{
$this->entityManager = $entityManager;
}

public function loadEvents(CalendarEvent $calendarEvent)
{
$startDate = $calendarEvent->getStartDatetime();
$endDate = $calendarEvent->getEndDatetime();

// The original request so you can get filters from the calendar
// Use the filter in your query for example

$request = $calendarEvent->getRequest();
$filter = $request->get('param');

// load events using your custom logic here,
// for instance, retrieving events from a repository
if($filter == 'calendar')
{
    $companyEvents = $this->entityManager->getRepository('TorBundle:ReservationTor')->findAll();
}else
{
   // $companyEvents = $this->entityManager->getRepository('TorBundle:InstructorsReservation')->findAll();



    $companyEvents = $this->entityManager->getRepository('TorBundle:InstructorsReservation')
        ->createQueryBuilder('instructor_events')
        ->where('instructor_events.idInstructor = :id')
        ->setParameter('id', $filter)
        ->getQuery()->getResult();

}

// $companyEvents and $companyEvent in this example
// represent entities from your database, NOT instances of EventEntity
// within this bundle.
//
// Create EventEntity instances and populate it's properties with data
// from your own entities/database values.

foreach($companyEvents as $companyEvent) {

// create an event with a start/end time, or an all day event
    if($filter == 0)
    {
        $eventEntity = new EventEntity((string)$companyEvent->getUserId(), $companyEvent->getDataStart(), $companyEvent->getDateStop());
    }else
    {
        $eventEntity = new EventEntity((string)$companyEvent->getIdUser(), $companyEvent->getDateStart(), $companyEvent->getDateStop());
    }

//optional calendar event settings
$eventEntity->setAllDay(false); // default is false, set to true if this is an all day event
$eventEntity->setBgColor('#FC2A0A'); //set the background color of the event's label
$eventEntity->setFgColor('#FFFFFF'); //set the foreground color of the event's label
//$eventEntity->setUrl('http://www.google.com'); // url to send user to when event label is clicked
$eventEntity->setCssClass('my-custom-class'); // a custom class you may want to apply to event labels

//finally, add the event to the CalendarEvent for displaying on the calendar
$calendarEvent->addEvent($eventEntity);

}
}
}