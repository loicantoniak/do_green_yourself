<?php

namespace App\EventSubscriber;


use App\Entity\Tutorial;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class IllustrationTutorialFileUploadEventSubscriber implements EventSubscriberInterface
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

        if (!($entity instanceof Tutorial)) {
            return;
        }

        // Get request
        $request = $event->getArgument('request');

        // Get delete flag
        if (isset($request->request->get('tutorial')['delete']) && $request->request->get('tutorial')['delete']) {
            $entity->setIllustration(null);
        }
        // Get file
        $file = $request->files->get('tutorial')['illustration'];
        if ($file && $file->isValid()) {
            // Update entity
            $entity->setIllustration(file_get_contents($file->getPathName()));
        }

        $event['entity'] = $entity;
    }
}
