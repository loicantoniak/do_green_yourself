<?php

namespace App\DataFixtures;

use App\Entity\Shop;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ShopFixtures extends SqlFixturesLoader implements DependentFixtureInterface
{
    private $faker;
    public const SHOP1_REFERENCE = 'shop1';
    public const SHOP2_REFERENCE = 'shop2';

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR'); // create a French faker
    }

    public function load(ObjectManager $manager)
    {
        parent::load($manager);

        $shop1 = new Shop();
        $shop1->setName($this->faker->company);
        $shop1->setAddress($this->faker->streetAddress);
        $shop1->setPostalCode(mb_ereg_replace('[^0-9]', '', $this->faker->postcode));
        $shop1->setCity($this->faker->city);
        $shop1->setCountry($this->faker->country);
        $shop1->setPhone(mb_ereg_replace('[^0-9]', '', $this->faker->phoneNumber));
        $shop1->setEmail($this->faker->companyEmail);
        $shop1->setLongitude($this->faker->longitude);
        $shop1->setLatitude($this->faker->latitude);
        $shop1->addUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $shop1->addUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $manager->persist($shop1);

        $shop2 = new Shop();
        $shop2->setName($this->faker->company);
        $shop2->setAddress($this->faker->streetAddress);
        $shop2->setPostalCode(mb_ereg_replace('[^0-9]', '', $this->faker->postcode));
        $shop2->setCity($this->faker->city);
        $shop2->setCountry($this->faker->country);
        $shop2->setPhone(mb_ereg_replace('[^0-9]', '', $this->faker->phoneNumber));
        $shop2->setEmail($this->faker->companyEmail);
        $shop2->setLongitude($this->faker->longitude);
        $shop2->setLatitude($this->faker->latitude);
        $shop2->addUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $manager->persist($shop2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class];
    }
}
