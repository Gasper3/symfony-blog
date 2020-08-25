<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixture extends BaseFixture implements DependentFixtureInterface
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_articles', function($count) use ($manager) {
            $article = new Article();
            $article->setTitle($this->faker->sentence())
                ->setContent($this->faker->paragraphs($nb = 3, $asText = true));

            // publish most articles
            if ($this->faker->boolean(70)) {
                $article->setPublishedAt($this->faker->dateTimeBetween('-10 days', '-1 days'));
            }

            $article->setAuthor($this->getRandomReference('main_users'));
            $article->setImageFilename('space.jpg');
            return $article;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixture::class];
    }

}
