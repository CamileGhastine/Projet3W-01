<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Lesson;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LessonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $user = $this->getReference('admin', User::class);

        for($i=0; $i<30; $i++) {
            $category = $this->getReference('category'. rand(0, 4), Category::class);
            
            $n = rand(0,3);
            $tags = [];
            for($k=0; $k<=$n; $k++) {
                $tags[] = $this->getReference('tag'. rand(0, 9), Tag::class);
            }

            $m = rand(0,3);
            $exercises = [];
            for($l=0; $l<=$m; $l++) {
                $exercise[] = $this->getReference('exercice'. rand(0, 9), Exercise::class);
            }
           
            $lesson = new Lesson;

            $lesson->setTitle($faker->sentence())
            ->setCreatedAt($faker->dateTime())
            ->setSummary($faker->text(500))
            ->setContent($faker->paragraph(100))
            ->setStatus(rand(0,3))
            ->setCategory($category)
            ->setUser($user);
            foreach($tags as $tag) {
                $lesson->addTag($tag);
            }
            foreach($exercises as $exercise) {
                $lesson->addExercice($exercise);
            }


            $manager->persist($lesson);
        } 

        $manager->flush();
    }

    /**
     * @return string[]
     */
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            UserFixtures::class,
            TagFixtures::class,
        ];
    }
}
