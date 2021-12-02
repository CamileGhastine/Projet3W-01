<?php

namespace App\Controller\Front;

use App\Entity\User;
use App\Form\Type\UserInformationType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/student')]
class StudentAccountController extends AbstractController
{
    #[Route('/account', name: 'student_account')]
    public function index(): Response
    { 
        return $this->render('front/student_account/index.html.twig', []);
    }

    #[Route('/account/edit/{id}', name: 'student_account_edit', requirements: ['page' => '\d+'])]
    public function studentAccountEdit(User $student, UserRepository $userRepo, Request $request): Response
    {
        if ( $this->getUser() !== $student) {
           return $this->redirectToRoute('home');
        }

        $form = $this->createForm(UserInformationType::class, $student);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute('student_account');
        }

        return $this->render('front/student_account/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
