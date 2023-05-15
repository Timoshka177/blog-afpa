<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use App\Entity\Category;
use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory; // importer le fakerphp

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR'); // créer mon faker

        // $product = new Product();
        // $manager->persist($product);

        for($i = 0; $i <= 5; $i++) {

            // Création des catégories
            $category = new Category(); 
            $category->setName($faker->word());
            $category->setDescription($faker->text());

            $manager->persist($category); // insérer en BDD la catégorie

            // Création de nos articles
            for($j = 0; $j <= 3; $j++) {
                $article = new Articles();
                $article->setAuthor($faker->name());
                $article->setAuthorWebsite($faker->name());
                $article->setCatchPhrase($faker->text());
                $article->setCategory($category);
                $article->setDate($faker->dateTime());
                $article->setPicture($faker->imageUrl());
                $article->setRelatedCourse($faker->numberBetween(1, 99));
                $article->setTitle($faker->title());
                $article->setRelatedSubjects([$faker->word()]);
                $article->setLegendMainPicture($faker->text());
                $article->setChapo($faker->text());
                $article->setDescription($faker->text());

                $manager->persist($article); // insère en bdd l'article
            }

            // Création des contacts
            $contact = new Contact();
            $contact->setEmail($faker->email());
            $contact->setFirstName($faker->firstName());
            $contact->setLastName($faker->lastName());
            $contact->setMessage($faker->text());
            $contact->setObject($faker->text());
            $contact->setPhone($faker->phoneNumber());

            $manager->persist($contact); // insère en bdd le contact

        }

        $manager->flush();
    }
}
