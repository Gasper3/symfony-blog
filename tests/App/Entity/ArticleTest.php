<?php


namespace App\Tests\App\Entity;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ArticleTest extends KernelTestCase
{
    private $entityManager;

    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();
        parent::setUp();
    }

    public function testSomething()
    {
        $articleR = $this->entityManager->getRepository(Article::class);
        $article = $articleR->findOneBy(['id' => 121]);
        $this->assertIsString($article->getTitle());
    }
}