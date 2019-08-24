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
        return $this->render( 'default/index.html.twig', [
            "name" => ucwords(str_replace('-',' ',$slug)),
            'greeting'=> 'Title'
        ]);
    }
}