<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Exercise;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ExerciseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
            for($i=0; $i<10; $i++) {
                $exercise = new Exercise;
                $exercise->setTitle($faker->word(rand(1, 5)))
                ->setContent($faker->text(1000));

                $this->addReference('exercise' . $i, $exercise);
               
                $manager->persist($exercise); 
            }
            
        $manager->flush();
    }
}
