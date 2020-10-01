<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class StepFixtures extends SqlFixturesLoader implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [TutorialFixtures::class];
    }
}
