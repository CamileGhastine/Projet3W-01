<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Tag;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
            for($i=0; $i<10; $i++) {
                $tag = new Tag;
                $tag->setTitle($faker->word());

                $this->addReference('tag' . $i, $tag);
               
                $manager->persist($tag); 
            }
            
        $manager->flush();
    }
}


