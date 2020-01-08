<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        for ($i=1;$i<=5;$i++)
        {
            $article = new Article();
            $article->setTitle($this->faker->title)
                ->setSlug($this->faker->slug)
                ->setPublishedAt($this->faker->dateTimeBetween('-10 days', '-1 days'))
                ->setContent($this->faker->text($maxNbChars=1000))
                ->setImageFilename($this->faker->imageUrl($width=200, $height=140));
            $manager->persist($article);
            $comment1 = new Comment();
            $comment1->setAuthorName('Kacper');
            $comment1->setContent($this->faker->sentence());
            $comment1->setArticle($article);
            $manager->persist($comment1);

            $comment2 = new Comment();
            $comment2->setAuthorName('Gasper');
            $comment2->setContent($this->faker->sentence());
            $comment2->setArticle($article);
            $manager->persist($comment2);

        }
        $manager->flush();
    }
}
