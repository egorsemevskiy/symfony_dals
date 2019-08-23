<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homePage()
    {
        return $this->render( 'default/index.html.twig', [
            'name' => "Дефаулт",
            'greeting'=> "Привет"
        ]);
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf("title of the atricle: %s", $slug));
    }
}