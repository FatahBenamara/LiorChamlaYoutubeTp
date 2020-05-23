<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;


class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

//créé 3 catégorie

for ($i=1; $i <= 3 ; $i++) { 
    
    $category = new Category();
    $category   ->setTitle($faker->sentence())
                ->setDescription($faker->paragraph())
             
                ;
    $manager->persist($category);
    
    //créé des articles entre 4 et 6



    for ($j=1; $j <= mt_rand(4,6) ; $j++) { 
    
        $article=new Article;
        $article->setTitle($faker->sentence())
                ->setContent($faker -> realText(rand(250, 500)))
                ->setImage($faker->imageUrl)
                ->setCreatedAt($faker -> dateTimeBetween('-6 months'))
                ->setCategory($category)
    
                ;
    $manager->persist($article);


        //créé des commentaire

        for ($k=1; $k <= mt_rand(4,10) ; $k++) { 
            
            $comment=new Comment;
            $comment->setAuthor($faker->name)
                    ->setContent($faker -> realText(rand(250, 500)))
                    ->setCreatedAt($faker -> dateTimeBetween('-40 days', 'now'))
                    ->setArticle($article)
            
            
            ;

        $manager->persist($comment);
        }

    
        
    }


}



        
        

        $manager->flush();
    }
}
