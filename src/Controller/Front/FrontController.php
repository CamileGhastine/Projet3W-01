<?php

namespace App\Controller\Front;

use App\Entity\Lesson;
use App\Entity\Category;
use App\Repository\LessonRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends AbstractController
{
    private LessonRepository $lessonRepository;
    private CategoryRepository $categoryRepository;

    public function __construct(LessonRepository $lessonRepository, CategoryRepository $categoryRepository)
    {
        $this->lessonRepository = $lessonRepository;
        $this->categoryRepository = $categoryRepository;
    }

    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('front/index.html.twig', [
            'lessons' => $this->lessonRepository->findall(),
        ]);
    }

    #[Route('/lesson', name: 'all_lessons')]
    public function index(): Response
    {
        return $this->render('front/index.html.twig', [
            'lessons' => $this->lessonRepository->findall(),
        ]);
    }

    #[Route('/lesson/category/{id<[0-9]+>}', name: 'lessons_by_category')]
    public function indexByCategory(Category $category): Response
    {
        return $this->render('front/index.html.twig', [
            'lessons' => $this->lessonRepository->findBy(['category' => $category]),
        ]);
    }

    #[Route('/lesson/{id<[0-9]+>}', name: 'show_lesson')]
    public function show(Lesson $lesson)
    {
        return $this->render('front/show.html.twig', [
            'lesson' => $lesson,
        ]);
    }

    #[Route('/lesson/search', name: 'search_lessons')]
    public function search(LessonRepository $lessonRepository, Request $request)
    {
        return $this->render('front/index.html.twig', [
            'lessons' => $lessonRepository->search($request->get('keyWord')),
        ]);
    }
}
