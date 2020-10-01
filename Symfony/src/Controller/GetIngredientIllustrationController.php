<?php

namespace App\Controller;

use App\Entity\ingredient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GetIngredientIllustrationController extends AbstractController
{
    public function __invoke(Ingredient $data): Response
    {
        if (!is_null($data)) {
            $response = new Response();
            $response->headers->set('Content-Type', 'image/jpg');
            $response->setContent(stream_get_contents($data->getIllustration()));

            return $response;
        }

        throw $this->createNotFoundException('This category does not exist');

        return $response;
    }
}
