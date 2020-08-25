<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_users', function ($i) use ($manager) {
            $user = new User();
            $user->setEmail(sprintf('kacper%d@example.com', $i));
            $user->setFirstName($this->faker->firstName);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
            '123'
            ));
            return $user;
        });

        $this->createMany(3, 'admin_users', function ($i) use ($manager) {
            $user = new User();
            $user->setEmail(sprintf('admin%d@example.com', $i));
            $user->setFirstName($this->faker->firstName);
            $user->setRoles(['ROLE_ADMIN', 'ROLE_ADMIN_ARTICLE']);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
            '123'
            ));
            return $user;
        });
        $manager->flush();
    }
}
