<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Colloque;
use App\Entity\Intervention;
use App\Entity\Person;
use App\Entity\Publication;
use App\Entity\Revue;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Creation du faker PHP pour generer des fake data
        $faker = Factory::create('fr FR');


        //Creation de deux personne
        $person1 = new Person();
        $person1->setFirstName('Mathis')->setName('Fumel');
        $manager->persist($person1);
        $person2 = new Person();
        $person2->setFirstName('Giles')->setName('Seper');
        $manager->persist($person2);
        //Creation de 5 Revue avec article colloque, intervention
        for ($i=0; $i<5; $i++)
        {
            $revue = new Revue();

            $revue->setTitle($faker->words(3, true))
                ->setResume($faker->text(350))
                ->setDatePubli($faker->dateTimeBetween('-6 month', 'now'))
                ->setSlug($faker->slug(3))
                ->setFile('test.jpg');
            //Création 6 Article
            for ($y=0; $y<6; $y++)
            {
                $article = new Article();

                $article->setTitle($faker->words(3, true))
                    ->setResume($faker->text(350))
                    ->setDatePubli($faker->dateTimeBetween('-6 month', 'now'))
                    ->setSlug($faker->slug(3))
                    ->setDocPDF('test.pdf')
                    ->setRevue($revue);
                $article->addPerson($person1);

                $manager->persist($article);
                $revue->addArticle($article);
            }
            //Creation 4 colloque
            for($z=0; $z<4; $z++)
            {
                $colloque = new Colloque();
                $colloque->setName($faker->words(3, true))
                    ->setDescription($faker->text(350))
                    ->setDateD($faker->dateTimeBetween('-6 month', '-2 month'))
                    ->setDateF($faker->dateTimeBetween('-2 month', 'now'))
                ->setLieu("LR")->setSlug($faker->slug(3));

                $colloque->addPerson($person2);
                // On crée des intervention pour la colloque
                for($a=0; $a<3; $a++)
                {
                    $intervention = new Intervention();

                    $intervention->setDescription($faker->text(350))
                        ->setDate($faker->dateTime())
                        ->setHourD($faker->dateTime())
                        ->setHourF($faker->dateTime())
                        ->setColloques($colloque)
                        ->addPerson($person2);

                    $manager->persist($intervention);
                    $colloque->addIntervention($intervention);
                }
                $manager->persist($colloque);
                $revue->addColloque($colloque);
            }
            $manager->persist($revue);
        }


        ///
        /// Création des publications x5
        ///
        for($i=0; $i<5; $i++)
        {
            $publication = new Publication();

            $publication->setTitle($faker->words(3, true))
                ->setResume($faker->text(350))
                ->setDatePubli($faker->dateTime())
                ->setFile('test.png')
                ->setSlug($faker->slug(3));

            $publication->addPerson($person1);
            $manager->persist($publication);
        }

        $manager->flush();
    }
}
