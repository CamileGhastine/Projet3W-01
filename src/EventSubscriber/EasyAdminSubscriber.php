<?php
namespace App\EventSubscriber;

use App\Entity\Lesson;
use App\Entity\User;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    public function __construct(private Security $security)
    {}

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
        $user = $this->security->getUser();
        $entity->setUser($user);
        $entity->setCreatedAt($dateTime);
    }
}
