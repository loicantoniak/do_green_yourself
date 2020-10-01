<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TutorialCategoryFixtures extends SqlFixturesLoader implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [TutorialFixtures::class, CategoryFixtures::class];
    }
}
