<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_articles', function($count) use ($manager) {
            $article = new Article();
            $article->setTitle($this->faker->sentence())
                ->setContent($this->faker->text($maxNbChars=3000));

            // publish most articles
            if ($this->faker->boolean(70)) {
                $article->setPublishedAt($this->faker->dateTimeBetween('-10 days', '-1 days'));
            }

            $article->setAuthor('Kacper')
                ->setImageFilename('space.jpg');
            return $article;
        });

        $manager->flush();
    }
}
