<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NeedFixtures extends SqlFixturesLoader implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [TutorialFixtures::class, IngredientFixtures::class];
    }
}
