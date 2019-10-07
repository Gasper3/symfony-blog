<?php


namespace App\Controller;


use App\Entity\Article;
use App\Repository\ArticleRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ArticleRepository $repository) {
        //pobranie wszystkich artykulow sortowanych przez date publikacji
        $articles = $repository->orderByPublishedAt();
        return $this->render('homepage.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/blog/{slug}", name="article")
     */
    public function list($slug, ArticleRepository $repository)
    {
        //pobranie jednego artykulu
        /** @var Article $article */
        $article = $repository->findOneBy(['slug' => $slug]);


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