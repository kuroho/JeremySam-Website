<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $faker;

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create("fr-FR");
        $this->addUsers($manager);

        $manager->flush();
    }

    public function addUsers(ObjectManager $manager): void
    {
        for($i=0; $i<10; $i++) 
        {
            $user = new User();
            $name = $this->faker->firstName;
            $surname = $this->faker->lastName;
            $ip = $this->faker->ipv4;
            $user->setName($name);
            $user->setSurname($surname);
            $user->setEmail($name.".".$surname."@yahoo.fr");
            $user->setIp($ip);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
