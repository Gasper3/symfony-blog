<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommentAdminController extends AbstractController
{
    /**
     * @Route("/admin/comment", name="admin_comment")
     */
    public function index(CommentRepository $repository, Request $request)
    {
        $search = $request->query->get('search');
        $comments = $repository->findAllBySearch($search);

        return $this->render('comment_admin/index.html.twig', [
            'comments' => $comments
        ]);
    }
}
