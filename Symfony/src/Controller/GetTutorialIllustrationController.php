<?php

namespace App\Controller;

use App\Entity\Tutorial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GetTutorialIllustrationController extends AbstractController
{
    public function __invoke(Tutorial $data): Response
    {
        if (!is_null($data)) {
            $response = new Response();
            $response->headers->set('Content-Type', 'image/jpg');
            $response->setContent(stream_get_contents($data->getIllustration()));

            return $response;
        }

        throw $this->createNotFoundException('This tutorial does not exist');

        return $response;
    }
}
