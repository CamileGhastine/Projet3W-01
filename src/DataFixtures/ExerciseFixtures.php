<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Exercise;

class ExerciseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
            for($i=0; $i<10; $i++) {
                $exercice = new Exercise;
                $exercice->setTitle($faker->word(rand(1, 5)))
                ->setContent($faker->text(1000));

                $this->addReference('exercice' . $i, $exercice);
               
                $manager->persist($exercise); 
            }
            
        $manager->flush();
    }
}
