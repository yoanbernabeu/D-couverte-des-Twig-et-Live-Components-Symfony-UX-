<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 10; $i++) { 
            $blog = new Blog();

            $blog->setTitle($faker->sentence())
                ->setContent($faker->paragraph());

            $manager->persist($blog);
        }

        $manager->flush();
    }
}
