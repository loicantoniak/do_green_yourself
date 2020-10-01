<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;
    public const COMMENT1_REFERENCE = 'comment1';
    public const COMMENT2_REFERENCE = 'comment2';
    public const COMMENT3_REFERENCE = 'comment3';

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR'); // create a French faker
    }

    public function load(ObjectManager $manager)
    {
        $comment1 = new Comment();
        $comment1->setUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $comment1->setTutorial($this->getReference(TutorialFixtures::TUTORIAL1_REFERENCE));
        $comment1->setText($this->faker->text);
        $comment1->setDate($this->faker->dateTime);

        $this->addReference(self::COMMENT1_REFERENCE, $comment1);
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2->setUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $comment2->setTutorial($this->getReference(TutorialFixtures::TUTORIAL1_REFERENCE));
        $comment2->setText($this->faker->text);
        $comment2->setDate($this->faker->dateTime);
        $this->addReference(self::COMMENT2_REFERENCE, $comment2);
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3->setUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $comment3->setTutorial($this->getReference(TutorialFixtures::TUTORIAL1_REFERENCE));
        $comment3->setParentComment($this->getReference(CommentFixtures::COMMENT2_REFERENCE));
        $comment3->setText($this->faker->text);
        $comment3->setDate($this->faker->dateTime);
        $this->addReference(self::COMMENT3_REFERENCE, $comment3);
        $manager->persist($comment3);

        $comment4 = new Comment();
        $comment4->setUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $comment4->setTutorial($this->getReference(TutorialFixtures::TUTORIAL1_REFERENCE));
        $comment4->setParentComment($this->getReference(CommentFixtures::COMMENT3_REFERENCE));
        $comment4->setText($this->faker->text);
        $comment4->setDate($this->faker->dateTime);
        $manager->persist($comment4);

        $comment5 = new Comment();
        $comment5->setUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $comment5->setTutorial($this->getReference(TutorialFixtures::TUTORIAL1_REFERENCE));
        $comment5->setParentComment($this->getReference(CommentFixtures::COMMENT1_REFERENCE));
        $comment5->setText($this->faker->text);
        $comment5->setDate($this->faker->dateTime);
        $manager->persist($comment5);

        for ($i = 0; $i < 10; ++$i) {
            $comment = new Comment();
            $comment->setUser($this->getReference(UserFixtures::USER1_REFERENCE));
            $comment->setTutorial($this->getReference(TutorialFixtures::TUTORIAL2_REFERENCE));
            $comment->setText($this->faker->text);
            $comment->setDate($this->faker->dateTime);
            $manager->persist($comment);
        }

        for ($i = 0; $i < 10; ++$i) {
            $comment = new Comment();
            $comment->setUser($this->getReference(UserFixtures::USER2_REFERENCE));
            $comment->setTutorial($this->getReference(TutorialFixtures::TUTORIAL2_REFERENCE));
            $comment->setText($this->faker->text);
            $comment->setDate($this->faker->dateTime);
            $manager->persist($comment);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class, TutorialFixtures::class];
    }
}
