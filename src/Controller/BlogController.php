<?php


namespace App\Controller;


use App\Entity\Article;
use App\Repository\ArticleRepository;
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
        //articles ordered by publish date
        $articles = $repository->orderByPublishedAt();

        return $this->render('homepage.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/blog/{slug}", name="article")
     */
    public function list(Article $article, MarkdownParserInterface $markdownParser)
    {
        return $this->render('blog/blog.html.twig', [
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
}