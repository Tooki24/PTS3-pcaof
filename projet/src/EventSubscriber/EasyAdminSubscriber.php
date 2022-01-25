<?php

namespace App\EventSubscriber;


use App\Entity\Publication;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispacher\EventSubsriberInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $slugger;

    public function __construct(SluggerInteface $slugger)
    {
        $this->slugger = $this->slugger;
    }

    public static function getSubscribedEvent()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setArticleSlugAndDate'],
        ];
    }

    public function setArticleSlugAndDate(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Article)) {
            return;
        }
        $slug = $this->slugger->slug($entity->getTitre());
        $entity->setSlug($slug);

        $now = new DateTime('now');
        $entity->setDatePubli($now);


    }
}
