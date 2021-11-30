<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for($i=0; $i<5; $i++) {
            $category = new Category;
            $category->setTitle($faker->word());

            $this->addReference('category' . $i, $category);
       
            $manager->persist($category); 
        }
       

        $manager->flush();
    }
}
