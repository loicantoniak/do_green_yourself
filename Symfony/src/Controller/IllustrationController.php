<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Ingredient;
use App\Entity\Shop;
use App\Entity\Tutorial;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IllustrationController extends AbstractController
{
    /**
     * @Route("/illustrationShop/{id}", name="illustrationShop")
     *
     * @return Response
     */
    public function illustrationShop(Shop $shop)
    {
        return new Response(stream_get_contents($shop->getPhoto()), 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'inline; filename="image'.$shop->getId().'.jpg"',
        ]);
    }

    /**
     * @Route("/illustrationCategory/{id}", name="illustrationCategory")
     *
     * @return Response
     */
    public function illustrationCategory(Category $category)
    {
        return new Response(stream_get_contents($category->getIllustration()), 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'inline; filename="image'.$category->getId().'.jpg"',
        ]);
    }

    /**
     * @Route("/illustrationIngredient/{id}", name="illustrationIngredient")
     *
     * @return Response
     */
    public function illustrationIngredient(Ingredient $ingredient)
    {
        return new Response(stream_get_contents($ingredient->getIllustration()), 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'inline; filename="image'.$ingredient->getId().'.jpg"',
        ]);
    }

    /**
     * @Route("/illustrationTutorial/{id}", name="illustrationTutorial")
     *
     * @return Response
     */
    public function illustrationTutorial(Tutorial $tutorial)
    {
        return new Response(stream_get_contents($tutorial->getIllustration()), 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'inline; filename="image'.$tutorial->getId().'.jpg"',
        ]);
    }

    /**
     * @Route("/illustrationUser/{id}", name="illustrationUser")
     *
     * @return Response
     */
    public function illustrationUser(User $user)
    {
        return new Response(stream_get_contents($user->getPhoto()), 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'inline; filename="image'.$user->getId().'.jpg"',
        ]);
    }
}
