<?php

namespace App\DataFixtures;

use App\Entity\Tutorial;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class TutorialFixtures extends SqlFixturesLoader implements DependentFixtureInterface
{
    private $faker;
    public const TUTORIAL1_REFERENCE = 'tutorial1';
    public const TUTORIAL2_REFERENCE = 'tutorial2';

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR'); // create a French faker
    }

    public function load(ObjectManager $manager)
    {
        parent::load($manager);

        $tutorial1 = new Tutorial();
        $tutorial1->setPostUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $tutorial1->setTitle($this->faker->word);
        $tutorial1->setDescription($this->faker->sentence);
        $tutorial1->setPreparationTime($this->faker->dateTime);
        $tutorial1->setStatus('Online');
        $tutorial1->setDate($this->faker->dateTime);
        $tutorial1->addBookmarkUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $tutorial1->addBookmarkUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $this->addReference(self::TUTORIAL1_REFERENCE, $tutorial1);
        $manager->persist($tutorial1);

        $tutorial2 = new Tutorial();
        $tutorial2->setPostUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $tutorial2->setTitle($this->faker->word);
        $tutorial2->setDescription($this->faker->sentence);
        $tutorial2->setPreparationTime($this->faker->dateTime);
        $tutorial2->setStatus('Online');
        $tutorial2->setDate($this->faker->dateTime);
        $tutorial2->addBookmarkUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $this->addReference(self::TUTORIAL2_REFERENCE, $tutorial2);
        $manager->persist($tutorial2);

        $tutorial3 = new Tutorial();
        $tutorial3->setPostUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $tutorial3->setTitle($this->faker->word);
        $tutorial3->setDescription($this->faker->sentence);
        $tutorial3->setPreparationTime($this->faker->dateTime);
        $tutorial3->setStatus('Being edited');
        $tutorial3->setDate($this->faker->dateTime);
        $tutorial3->addBookmarkUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $manager->persist($tutorial3);

        $tutorial4 = new Tutorial();
        $tutorial4->setPostUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $tutorial4->setTitle($this->faker->word);
        $tutorial4->setDescription($this->faker->sentence);
        $tutorial4->setPreparationTime($this->faker->dateTime);
        $tutorial4->setStatus('Waiting for validation');
        $tutorial4->setDate($this->faker->dateTime);
        $manager->persist($tutorial4);

        $tutorial5 = new Tutorial();
        $tutorial5->setPostUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $tutorial5->setTitle($this->faker->word);
        $tutorial5->setDescription($this->faker->sentence);
        $tutorial5->setPreparationTime($this->faker->dateTime);
        $tutorial5->setStatus('Offline');
        $tutorial5->setDate($this->faker->dateTime);
        $tutorial5->addBookmarkUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $manager->persist($tutorial5);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class];
    }
}
