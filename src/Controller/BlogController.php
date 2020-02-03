<?php


namespace App\Controller;


use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Knp\Bundle\MarkdownBundle\Helper\MarkdownHelper;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ArticleRepository $repository)
    {
        $articles = $repository->orderByPublishedAtMaxThree();

        return $this->render('homepage.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/article/{slug}", name="article")
     */
    public function show(Article $article, MarkdownParserInterface $markdownParser)
    {
        return $this->render('blog/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/sign_up", name="sign_up")
     */
    public function signUp()
    {
        return $this-> render('blog/signup.html.twig');
    }

    /**
     * @Route("/articles", name="allArticles")
     */
    public function showAll(ArticleRepository $repository)
    {
        $articles = $repository->orderByPublishedAt();
        return $this->render('blog/all_articles.html.twig', [
            'articles' => $articles,
        ]);
    }
}