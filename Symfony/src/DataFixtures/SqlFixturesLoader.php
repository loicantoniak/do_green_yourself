<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;

class SqlFixturesLoader extends Fixture
{
    public const DIRECTORY = 'sql';

    public function load(ObjectManager $manager)
    {
        $finder = new Finder();
        // Where ?
        $finder->in(__DIR__.DIRECTORY_SEPARATOR.self::DIRECTORY);
        // Which file ? Based on class name
        $name_parts = explode('\\', static::class);
        $filename = array_pop($name_parts).'.sql';
        $finder->name($filename);

        foreach ($finder as $file) {
            echo "Importing : {$file->getBasename()} ".PHP_EOL;

            $sql = $file->getContents();

            $manager->getConnection()->exec($sql); //Execute native SQL

            $manager->flush();
        }
    }
}
