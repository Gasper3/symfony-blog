<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage() {
        return $this->render('homepage.html.twig');
    }

    /**
     * @Route("/blog/{slug}", name="blog-list")
     */
    public function list($slug)
    {
    return $this->render('blog/blog.html.twig', [
       'title' => $slug,
    ]);
    }

    /**
     * @Route("/sign_up", name="sign_up")
     */
    public function signUp()
    {
        return new Response("<h1>dziala</h1>");
    }
}