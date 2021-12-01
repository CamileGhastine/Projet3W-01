<?php

namespace App\Controller\Front;

use App\Entity\Lesson;
use App\Entity\Category;
use App\Repository\LessonRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
            'categories' => $this->categoryRepository->findAll()
        ]);
    }

    #[Route('/lesson', name: 'all_lessons')]
    public function index(): Response
    {
        return $this->render('front/index.html.twig', [
            'lessons' => $this->lessonRepository->findall(),
            'categories' => $this->categoryRepository->findAll()
        ]);
    }

    #[Route('/lesson/category/{id<[0-9]+>}', name: 'lessons_by_category')]
    public function indexByCategory(Category $category): Response
    {
        return $this->render('front/index.html.twig', [
            'lessons' => $this->lessonRepository->findBy(['category' => $category]),
            'categories' => $this->categoryRepository->findAll()
        ]);
    }

    #[Route('/lesson/{id<[0-9]+>}', name: 'show_lesson')]
    public function show(Lesson $lesson)
    {
        return $this->render('front/show.html.twig', [
            'lesson' => $lesson,
            'categories' => $this->categoryRepository->findAll()
        ]);
    }
}
