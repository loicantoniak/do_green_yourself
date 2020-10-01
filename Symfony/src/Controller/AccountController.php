<?php

namespace App\Controller;

use App\Form\ResetPasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     */
    public function index()
    {
        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    /**
     * @Route("/resetPassword", name="resetPassword")
     */
    public function resetPassword(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = $this->getUser();

        $form = $this->createForm(ResetPasswordType::class, $user);

        if ($request->isMethod('POST')) {
            $oldPassword = $request->get('reset_password')['oldPassword'];

            $checkPass = $passwordEncoder->isPasswordValid($user, $oldPassword);

            $newPassword = $request->get('reset_password')['password'];

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                if (true === $checkPass) {
                    $entityManager = $this->getDoctrine()->getManager();

                    $newPasswordEncoder = $passwordEncoder->encodePassword($user, $newPassword);

                    $user->setPassword($newPasswordEncoder);

                    $entityManager->persist($user);

                    $entityManager->flush();

                    return
                        $this->redirectToRoute('app_logout');
                } else {
                    $this->addFlash('fail', 'mauvais mot de passe !');
                }
            }
        }

        return $this->render('account/resetPassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
