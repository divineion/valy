<?php

namespace App\EventSubscriber;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminSuscriber implements EventSubscriberInterface
{
    public function getSuscriberEvets() 
    {
        return [
            BeforeEntityPersistedEvent::class=> ['setEntityCreratedAt']
        ];
    }

    public function setEntityCreratedAt(BeforeEntityPersistedEvent $event) 
    {
        $entity = $event -> getEntityInstance();
    }

}


