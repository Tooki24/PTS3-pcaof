<?php

namespace App\EventSubscriber;


use App\Entity\Publication;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispacher\EventSubsriberInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvent()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setDate'],
        ];
    }

    public function setDate(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        /*
        if (!($entity instanceof Article) or !($entity instanceof publication)) {
            return;
        }
        */
        $now = new DateTime('now');
        $entity->setDatePubli($now);
    }


}
