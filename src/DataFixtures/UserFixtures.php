<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->getUserData() as [$fullname, $username, $password, $email, $roles]) {
            $user = new User();
            $user->setFullName($fullname);
            $user->setUsername($username);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setEmail($email);
            $user->setRoles($roles);

            $manager->persist($user);
            $this->addReference($username, $user);
        }

        $manager->flush();
    }

    private function getUserData(): array
    {
        return [
            ['Malick NDIAYE', 'malick', 'malick2018!', 'malick@gmail.com', ['ROLE_ADMIN']],
            ['Khadim THIAM', 'khadim', 'khadim2018!', 'khadim@gmail.com', ['ROLE_ADMIN']],
            ['Thierno THIAM', 'thierno', 'thierno2018!', 'thierno@gmail.com', ['ROLE_ADMIN']],
            ['Madieng MBEGUERE', 'madieng', 'madieng2018!', 'mbegue.m@gmail.com', ['ROLE_ADMIN']],
        ];
    }
}
