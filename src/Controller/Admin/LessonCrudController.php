<?php

namespace App\Controller\Admin;

use App\Entity\Lesson;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class LessonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lesson::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Titre'),
            TextareaField::new('content', 'Contenu')->hideOnIndex(),
            AssociationField::new('exercises', 'Exercices')->hideOnIndex(),
            TextareaField::new('summary', 'Extrait')->hideOnIndex(),
            AssociationField::new('user', 'Auteur')->hideWhenCreating(),
            AssociationField::new('category', 'categories')->hideOnIndex(),
            AssociationField::new('tags', 'tags')->hideOnIndex(),
            IntegerField::new('status'),
            DateTimeField::new('createdAt', 'Créé le')->hideOnForm(),
            DateTimeField::new('publishedAt', 'Publié le'),
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $lesson = new Lesson();
        $lesson->setStatus(0);

        return $lesson;
    }
}
