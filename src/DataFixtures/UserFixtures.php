<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface  $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User;
        $user->setEmail('admin@projet3wa.fr')
        ->setPassword($this->passwordHasher->hashPassword($user, 'admin'))
        ->setRoles([0]);

        $manager->persist($user);

        $user = new User;
        $user->setEmail('student@projet3wa.fr')
        ->setPassword($this->passwordHasher->hashPassword($user, 'student'))
        ->setRoles([1]);

        $faker = Factory::create();

        for($i=0; $i<5; $i++) {
            $user = new User;
            $user->setEmail($faker->email())
            ->setPassword($this->passwordHasher->hashPassword($user, 'student'))
            ->setRoles([1]);
            
            $manager->persist($user);
        }

        $manager->persist($user);


        $manager->flush();
    }
}
