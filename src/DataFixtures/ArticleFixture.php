<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        for ($i=1;$i<=5;$i++) {
            $article = new Article();
            $article->setTitle($this->faker->title)
                ->setSlug($this->faker->slug)
                ->setPublishedAt($this->faker->dateTimeBetween('-10 days', '-1 days'))
                ->setContent($this->faker->text($maxNbChars = 1000))
                ->setImageFilename($this->faker->imageUrl($width=200, $height=140));
            $manager->persist($article);
        }
        $manager->flush();
    }
}
