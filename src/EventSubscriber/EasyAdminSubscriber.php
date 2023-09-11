<?php

namespace App\EventSubscriber;

use App\Model\TimestampedInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminSubscriber implements EventSubscriberInterface
{

    //définie comme public static function pour être compatible avec l'interface Symfony
    public static function getSubscribedEvents() //
    {
        
        return [
            //les fonctions exécutées avant la création d'une entité
/*événement écouté*/BeforeEntityPersistedEvent::class=> ['setEntityCreatedAt'], //méthode appelée
            BeforeEntityUpdatedEvent::class=> ['setEntityUpdatedAt']
        ];
    }

    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event): void
    {
         
        $entity = $event -> getEntityInstance();

        var_dump($entity);

        if (!$entity instanceof TimestampedInterface) {
            return;
        }

        $entity->setCreatedAt(new \DateTime());
    }

    public function setEntityUpdatedAt(BeforeEntityPersistedEvent $event):void
    {
        //sera appliqué à chaque entité du back 
        $entity = $event -> getEntityInstance();

        if (!$entity instanceof TimestampedInterface) {
            return;
        }

        $entity->setUpdatedAt(new \DateTime());
    }

}


