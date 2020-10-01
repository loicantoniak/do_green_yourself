<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends SqlFixturesLoader
{
    private $faker;
    private $encoder;
    public const USER1_REFERENCE = 'user1';
    public const USER2_REFERENCE = 'user2';

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
        $this->faker = Factory::create('fr_FR'); // create a French faker
    }

    public function load(ObjectManager $manager)
    {
        parent::load($manager);

        echo "user1\n";
        $user1 = new User();
        $user1->setName($this->faker->name);
        $user1->setFirstname($this->faker->firstName);
        $user1->setAddress($this->faker->streetAddress);
        $user1->setPostalCode(mb_ereg_replace('[^0-9]', '', $this->faker->postcode));
        $user1->setCity($this->faker->city);
        $user1->setBirthDate($this->faker->dateTime);
        $user1->setCountry($this->faker->country);
        $user1->setEmail('admin@exemple.com');
        $user1->setReporting($this->faker->boolean);
        $user1->setRoles(['ROLE_ADMIN']);
        echo "user1\n";
        $encoded = $this->encoder->encodePassword($user1, 'test');
        $user1->setPassword($encoded);
        echo "user1\n";
        $user1->setPseudo($this->faker->userName);

        $this->addReference(self::USER1_REFERENCE, $user1);
        $manager->persist($user1);

        echo "user2\n";
        $user2 = new User();
        $user2->setName($this->faker->name);
        $user2->setFirstname($this->faker->firstName);
        $user2->setAddress($this->faker->streetAddress);
        $user2->setPostalCode(mb_ereg_replace('[^0-9]', '', $this->faker->postcode));
        $user2->setCity($this->faker->city);
        $user2->setBirthDate($this->faker->dateTime);
        $user2->setCountry($this->faker->country);
        $user2->setEmail('moderator@exemple.com');
        $user2->setReporting($this->faker->boolean);
        $user2->setRoles(['ROLE_MODERATOR']);
        $encoded = $this->encoder->encodePassword($user2, 'test');
        $user2->setPassword($encoded);
        $user2->setPseudo($this->faker->userName);

        $this->addReference(self::USER2_REFERENCE, $user2);
        $manager->persist($user2);

        $manager->flush();
    }
}
