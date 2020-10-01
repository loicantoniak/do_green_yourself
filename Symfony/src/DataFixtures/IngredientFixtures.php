<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class IngredientFixtures extends SqlFixturesLoader
{
    private $faker;
    public const INGREDIENT1_REFERENCE = 'ingredient1';
    public const INGREDIENT2_REFERENCE = 'ingredient2';

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR'); // create a French faker
    }

    public function load(ObjectManager $manager)
    {
        parent::load($manager);

        $ingredient1 = new Ingredient();
        $ingredient1->setName($this->faker->word);
        $ingredient1->setUnit('L');
        $ingredient1->setEssential($this->faker->boolean);

        $this->addReference(self::INGREDIENT1_REFERENCE, $ingredient1);
        $manager->persist($ingredient1);

        $ingredient2 = new Ingredient();
        $ingredient2->setName($this->faker->word);
        $ingredient2->setUnit('L');
        $ingredient2->setEssential($this->faker->boolean);

        $this->addReference(self::INGREDIENT2_REFERENCE, $ingredient2);
        $manager->persist($ingredient2);

        $manager->flush();
    }
}
