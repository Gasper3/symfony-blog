<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(User::class, 10, function (User $user){
            $user->setEmail($this->faker->email)
                ->setPassword('qwerty');
        });

        $manager->flush();
    }
}
