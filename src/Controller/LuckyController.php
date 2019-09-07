<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number")
     */
    public function luckyNumber()
    {
        $number = random_int(5, 100);
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}