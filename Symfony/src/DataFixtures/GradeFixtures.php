<?php

namespace App\DataFixtures;

use App\Entity\Grade;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class GradeFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR'); // create a French faker
    }

    public function load(ObjectManager $manager)
    {
        $grade1 = new Grade();
        $grade1->setTutorial($this->getReference(TutorialFixtures::TUTORIAL1_REFERENCE));
        $grade1->setUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $grade1->setGrade($this->faker->numberBetween(0, 5));
        $manager->persist($grade1);

        $grade2 = new Grade();
        $grade2->setTutorial($this->getReference(TutorialFixtures::TUTORIAL2_REFERENCE));
        $grade2->setUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $grade2->setGrade($this->faker->numberBetween(0, 5));
        $manager->persist($grade2);

        $grade3 = new Grade();
        $grade3->setTutorial($this->getReference(TutorialFixtures::TUTORIAL1_REFERENCE));
        $grade3->setUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $grade3->setGrade($this->faker->numberBetween(0, 5));
        $manager->persist($grade3);

        $grade4 = new Grade();
        $grade4->setTutorial($this->getReference(TutorialFixtures::TUTORIAL2_REFERENCE));
        $grade4->setUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $grade4->setGrade($this->faker->numberBetween(0, 5));
        $manager->persist($grade4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class, TutorialFixtures::class];
    }
}
