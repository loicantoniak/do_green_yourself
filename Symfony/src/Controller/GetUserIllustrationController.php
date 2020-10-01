<?php

namespace App\Controller;

use App\Entity\USer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GetUserIllustrationController extends AbstractController
{
    public function __invoke(User $data): Response
    {
        if (!is_null($data)) {
            $response = new Response();
            $response->headers->set('Content-Type', 'image/jpg');
            $response->setContent(stream_get_contents($data->getPhoto()));

            return $response;
        }

        throw $this->createNotFoundException('This category does not exist');

        return $response;
    }
}
