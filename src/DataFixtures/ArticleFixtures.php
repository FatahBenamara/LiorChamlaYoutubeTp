<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i=1; $i <=10 ; $i++) { 
      
            $article=new Article;
            $article->setTitle("Titre de l'article n°$i")
                    ->setContent("conteu de l'artile n°$i")
                    ->setImage("https://via.placeholder.com/250x350")
                    ->setCreatedAt(new \DateTime())
      
                    ;
        $manager->persist($article);

            
        }
        
        

        $manager->flush();
    }
}
