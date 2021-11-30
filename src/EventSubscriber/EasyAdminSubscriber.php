<?php
namespace App\EventSubscriber;

use App\Entity\Lesson;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setLessonDateAndUser'],
        ];
    }

    public function setLessonDateAndUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Lesson)) {
            return;
        }

        $dateTime = new DateTime('now');
        $entity->setCreatedAt($dateTime)->setStatus(0);
    }
}