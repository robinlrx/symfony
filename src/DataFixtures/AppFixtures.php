<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    )
    {
    }

    public function load(ObjectManager $manager): void
    {

        for ($i = 1; $i <= 11; $i++) {
            $user = new User();
            $user->setEmail('user' . $i . '@gmail.com');
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
            if ($i === 1) {
                $user->setRoles(['ADMIN']);
            } else {
                $user->setRoles(['USER']);
            }

            $manager->persist($user);
        }

        $manager->flush();
    }
}
