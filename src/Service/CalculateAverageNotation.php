<?php

namespace App\Service;

use App\Entity\Lesson;
use App\Repository\CategoryRepository;
use App\Repository\LessonRepository;
use Doctrine\ORM\EntityManagerInterface;

Class CalculateAverageNotation
{
    private EntityManagerInterface $manager;
    private LessonRepository $lessonRepository;

    public function __construct(EntityManagerInterface $manager, LessonRepository $lessonRepository)
    {
        $this->manager = $manager;
        $this->LessonRepository = $lessonRepository;
    }

    public function calcul(Lesson $lesson, int $note)
    {
        $numberOfNote = $lesson->getNumberOfNote();
        $averageNote = ($lesson->getNumberOfNote()*$lesson->getAverageNote() + $note) / ($numberOfNote + 1);

        $lesson->setAverageNote($averageNote)
        ->setNumberOfNote($numberOfNote + 1);

        $this->manager->flush();
    }
}