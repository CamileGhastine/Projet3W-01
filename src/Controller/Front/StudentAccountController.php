<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
