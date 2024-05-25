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
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\FakeCar($faker));
        // create 5 cars!
        for ($i = 1; $i < 6; $i++) {
            $car = new Car();
            $car->setName($faker->vehicle());
            $car->setContent($car->getName().' est une voiture '.$faker->vehicleFuelType().' de type '.$faker->vehicleType());
            $car->setDailyPrice(round(30 + mt_rand() / mt_getrandmax() * (600 - 580), 2));
            $car->setMonthlyPrice(round(300 + mt_rand() / mt_getrandmax() * (10000 - 9000), 2));
            $car->setPlaces(mt_rand(1, 9));
            $car->setGearbox(mt_rand(0, 1));

            $manager->persist($car);
        }

        $manager->flush();
    }
}