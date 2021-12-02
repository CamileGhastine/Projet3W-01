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
        $user->setEmail('admin@3wa.fr')
        ->setFirstname('Jeau-Claude')
        ->setLastname('Convenant')
        ->setPassword($this->passwordHasher->hashPassword($user, 'admin'))
        ->setRoles(['ROLE_ADMIN']);

        $this->addReference('admin', $user);

        $manager->persist($user);

        $user = new User;
        $user->setEmail('student@3wa.fr')
        ->setFirstname('John')
        ->setLastname('Do')
        ->setPassword($this->passwordHasher->hashPassword($user, 'student'));

        $manager->persist($user);

        $faker = Factory::create('fr_FR');

        for($i=0; $i<5; $i++) {
            $user = new User;
            $user->setEmail($faker->email())
            ->setFirstname($faker->firstName())
            ->setLastname($faker->lastName())
            ->setPassword($this->passwordHasher->hashPassword($user, 'student'))
            ->setRoles([1]);

            $manager->persist($user);
        }

        $manager->persist($user);


        $manager->flush();
    }
}
