<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{   
    const DEFAULT_USER = [
        "password" => "admin",
        "username" => "admin",
        "roles" => ["ROLE_ADMIN"]
    ];

    protected $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $defaultUser = new User();
        $passHash = $this->encoder->encodePassword($defaultUser, self::DEFAULT_USER["password"]);

        $defaultUser->setUsername(self::DEFAULT_USER["username"])
                    ->setPassword($passHash)
                    ->setRoles(self::DEFAULT_USER["roles"]);

        $manager->persist($defaultUser);

        $manager->flush();
    }
}
