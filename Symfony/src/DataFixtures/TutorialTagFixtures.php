<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TutorialTagFixtures extends SqlFixturesLoader implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [TutorialFixtures::class, TagFixtures::class];
    }
}
