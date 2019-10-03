<?php


namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogAdminController extends AbstractController
{

    /**
     * @Route("/admin/new", name="admin_new_article")
     */
    public function new(EntityManagerInterface $em)
    {
        $article = new Article();
        $article->setTitle('Kurde działa1234')
            ->setContent('Nie wierzę w to :D')
            ->setPublishedAt(new \DateTime())
            ->setSlug('kacper'.rand(1,100));
        $em->persist($article);
        $em->flush();
        return new Response(sprintf(
            'Właśnie stworzyłeś artykuł o nazwie %s',
            $article->getSlug()
        ));
    }
}