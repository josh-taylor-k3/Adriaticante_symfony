<?php

namespace App\Controller;

use App\Form\ProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function profile(
        EntityManagerInterface $entityManager
    ): Response
    {
        $user = $this->getUser();


        return $this->render('/user/profile.html.twig', [
            'user' => $user
        ]);
    }


    /**
     * @Route("/profile-edit", name="profile_update")
     */
    public function profileUpdate(
        Request $request,
        EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        $profileForm = $this->createForm(ProfileType::class, $user);
        $profileForm->handleRequest($request);

        if ($profileForm->isSubmitted() && $profileForm->isValid())
        {
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'The profile was updated.');
            return $this->redirectToRoute('profile');
        }

        return $this->render('/user/profileUpdate.html.twig', [
            'profileForm' => $profileForm->createView(),
            'user' => $user
        ]);
    }
}
