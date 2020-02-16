<?php


namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogAdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_article")
     */
    public function index()
    {
        return $this->render('article_admin/index.html.twig');
    }

    /**
     * @Route("/admin/article/new", name="admin_new_article")
     */
    public function new(EntityManagerInterface $em)
    {
        //creating article
        $article = new Article();
        $article->setTitle('Nowy wpis'.rand(1,100))
            ->setContent('Treść')
            ->setPublishedAt(new \DateTime())
            ->setSlug('wpis'.rand(1,100));

        $em->persist($article);
        $em->flush();
        return new Response(sprintf(
            'Właśnie stworzyłeś artykuł o nazwie %s',
            $article->getSlug()
        ));
    }

    /**
     * @Route("/admin/article/create", name="create_article")
     */
    public function create()
    {
        return $this->render('article_admin/create.html.twig');
    }
}