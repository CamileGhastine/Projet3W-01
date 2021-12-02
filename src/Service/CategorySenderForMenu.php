<?php


namespace App\Service;

use App\Repository\CategoryRepository;

Class CategorySenderForMenu
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function send() : array
    {
        return $this->categoryRepository->findAll();
    }
}