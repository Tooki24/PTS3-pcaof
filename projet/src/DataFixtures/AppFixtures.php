<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Colloque;
use App\Entity\Intervention;
use App\Entity\KeyWords;
use App\Entity\Person;
use App\Entity\Publication;
use App\Entity\Revue;
use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\HttpFoundation\File\File;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Creation du faker PHP pour generer des fake data
        $faker = Factory::create('fr FR');

        //Creation de l'admin
        $theAdmin = new Admin();
        $theAdmin->setUsername('admin');
        $theAdmin->setEMail('admin@example.com');
        $theAdmin->setPassword('$2y$13$BM7XXOufCzTOrQ8pMPPWduzxLR21zDOhbLKasDzy2E3Rf1la7qhmO');//hash : admin123
        $manager->persist($theAdmin);

        //Creation de deux personne
        $person1 = new Person();
        $person1->setFirstName('Mathis')->setName('Fumel')->setIsOffice(true)->setRole("Admin");
        $manager->persist($person1);
        $person2 = new Person();
        $person2->setFirstName('Giles')->setName('Seper')->setIsOffice(false)->setRole(null);;
        $manager->persist($person2);
        //Creation de 5 Revue avec article colloque, intervention
        for ($i=0; $i<5; $i++)
        {
            $revue = new Revue();

            $revue->setTitle($faker->words(3, true))
                ->setResume($faker->text(350))
                ->setDatePubli($faker->dateTimeBetween('-6 month', 'now'))
                ->setSlug($faker->slug(3))
                ->setImageName('test.jpg')
                ->setOnLine(true)
                ->setTheme($faker->text(35));
            //Création 6 Article
            for ($y=0; $y<6; $y++)
            {
                $article = new Article();

                $article->setTitle($faker->words(3, true))
                    ->setResume($faker->text(350))
                    ->setDatePubli($faker->dateTimeBetween('-6 month', 'now'))
                    ->setSlug($faker->slug(3))
                    ->setDocPDF('test.pdf')
                    ->setRevue($revue)
                    ->setOnLine(false);
                $article->addPerson($person1);

                $manager->persist($article);
                $revue->addArticle($article);
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
                ->setPdfName("test.pdf")
                ->setSlug($faker->slug(3))
                ->setOnLine(true)
                ->setImageName("image.png");

            //Crée 3 Key Word
            for($y=0; $y<2;$y++)
            {
                $keyWord = new KeyWords();

                $keyWord->setWord($faker->words(3, true));

                $keyWord->addPublication($publication);

                $manager->persist($keyWord);
            }

            $publication->addPerson($person1);
            $manager->persist($publication);
        }

        $manager->flush();
    }
}
