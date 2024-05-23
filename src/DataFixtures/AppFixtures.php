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
        // create 5 cars!
        for ($i = 1; $i < 6; $i++) {
            $car = new Car();
            $car->setName('Voiture '.$i);
            $car->setContent('Description de la voiture '.$i);
            $car->setDailyPrice(round(30 + mt_rand() / mt_getrandmax() * (600 - 580), 2));
            $car->setMonthlyPrice(round(300 + mt_rand() / mt_getrandmax() * (10000 - 9000), 2));
            $car->setPlaces(mt_rand(1, 9));
            $car->setGearbox(mt_rand(0, 1));

            $manager->persist($car);
        }

        $manager->flush();
    }
}