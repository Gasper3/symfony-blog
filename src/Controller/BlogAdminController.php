<?php


namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogAdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_article")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index()
    {
        return $this->render('article_admin/index.html.twig');
    }

    /**
     * @Route("/admin/article/create", name="create_article")
     */
    public function create()
    {
        return $this->render('article_admin/create.html.twig');
    }

    /**
     * @Route("/admin/article/new", name="admin_article_new")
     */
    public function new(EntityManagerInterface $em)
    {
        //creating article
        $article = new Article();
        $article->setTitle('New article'.rand(1,100))
            ->setContent('Content')
            ->setPublishedAt(new \DateTime())
            ->setSlug('article'.rand(1,100));

        $em->persist($article);
        $em->flush();
        return new Response(sprintf(
            'You have created article: %s',
            $article->getSlug()
        ));
    }

    /**
     * @Route("/admin/article/{id}/edit")
     * @IsGranted("MANAGE", subject="article")
     */
    public function edit(Article $article)
    {
        dd($article);
    }
}