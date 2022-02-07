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
            BeforeEntityPersistedEvent::class => ['setArticleDate'],
        ];
    }

    public function setArticleDate(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Article)) {
            return;
        }
        $now = new DateTime('now');
        $entity->setDatePubli($now);


    }
}
