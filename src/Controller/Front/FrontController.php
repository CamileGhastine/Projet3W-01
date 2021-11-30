<?php

namespace App\Controller\Front;

use App\Repository\LessonRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(LessonRepository $lessonRepository): Response
    {
        $lessons = $lessonRepository->findall();

        return $this->render('front/index.html.twig', [
            'lessons' => $lessons
        ]);
    }
}
