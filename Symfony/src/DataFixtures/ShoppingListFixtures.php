<?php

namespace App\DataFixtures;

use App\Entity\ShoppingList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ShoppingListFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR'); // create a French faker
    }

    public function load(ObjectManager $manager)
    {
        $shoppingList1 = new ShoppingList();
        $shoppingList1->setIngredient($this->getReference(IngredientFixtures::INGREDIENT1_REFERENCE));
        $shoppingList1->setUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $shoppingList1->setTotalAmount($this->faker->randomFloat());
        $manager->persist($shoppingList1);

        $shoppingList2 = new ShoppingList();
        $shoppingList2->setIngredient($this->getReference(IngredientFixtures::INGREDIENT2_REFERENCE));
        $shoppingList2->setUser($this->getReference(UserFixtures::USER1_REFERENCE));
        $shoppingList2->setTotalAmount($this->faker->randomFloat());
        $manager->persist($shoppingList2);

        $shoppingList3 = new ShoppingList();
        $shoppingList3->setIngredient($this->getReference(IngredientFixtures::INGREDIENT1_REFERENCE));
        $shoppingList3->setUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $shoppingList3->setTotalAmount($this->faker->randomFloat());
        $manager->persist($shoppingList3);

        $shoppingList4 = new ShoppingList();
        $shoppingList4->setIngredient($this->getReference(IngredientFixtures::INGREDIENT2_REFERENCE));
        $shoppingList4->setUser($this->getReference(UserFixtures::USER2_REFERENCE));
        $shoppingList4->setTotalAmount($this->faker->randomFloat());
        $manager->persist($shoppingList4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [IngredientFixtures::class, UserFixtures::class];
    }
}
