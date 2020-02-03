<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function(Article $article, $count) {
            $article->setTitle($this->faker->sentence())
                ->setPublishedAt($this->faker->dateTimeBetween('-10 days', '-1 days'))
                ->setContent($this->faker->text($maxNbChars=3000))
                ->setImageFilename($this->faker->imageUrl($width=100, $height=100));
        });

        $manager->flush();
    }
}
