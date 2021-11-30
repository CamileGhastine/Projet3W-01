<?php

namespace App\Controller\Front;

use App\Entity\Lesson;
use App\Repository\LessonRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    private LessonRepository $lessonRepository;

    public function __construct(LessonRepository $lessonRepository)
    {
        $this->lessonRepository = $lessonRepository;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('front/index.html.twig', [
            'lessons' => $this->lessonRepository->findall()
        ]);
    }

    #[Route('/lesson/{id<[0-9]+>}', name: 'show')]
    public function show(Lesson $lesson)
    {
        return $this->render('front/show.html.twig', [
            'lesson' => $lesson,
        ]);
    }
}
