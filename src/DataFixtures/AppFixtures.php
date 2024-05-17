<?php
// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 1; $i < 6; $i++) {
            $car = new Car();
            $car->setName('Voiture '.$i);
            $car->setContent('Description de la voiture '.$i);
            $car->setMonthlyPrice(mt_rand(100, 1000));
            $car->setDailyPrice(mt_rand(10, 100));
            $car->setPlaces(mt_rand(2, 7));
            $car->setGearbox(mt_rand(0, 1));

            $manager->persist($car);
        }

        $manager->flush();
    }
}