<?php

namespace App\EventSubscriber;

use App\Entity\Shop;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class IllustrationShopFileUploadEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        //die('Subscribe');
        return [
            EasyAdminEvents::PRE_PERSIST => ['setJpegData'],
            EasyAdminEvents::PRE_UPDATE => ['setJpegData'],
        ];
    }

    public function setJpegData(GenericEvent $event)
    {
        // Get entity
        $entity = $event->getSubject();

        if (!($entity instanceof Shop)) {
            return;
        }

        // Get request
        $request = $event->getArgument('request');

        // Get delete flag
        if (isset($request->request->get('shop')['delete']) && $request->request->get('shop')['delete']) {
            $entity->setPhoto(null);
        }
        // Get file
        $file = $request->files->get('shop')['illustration'];
        if ($file && $file->isValid()) {
            // Update entity
            $entity->setPhoto(file_get_contents($file->getPathName()));
        }

        $event['entity'] = $entity;
    }
}
