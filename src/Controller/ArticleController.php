<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homePage()
    {
        return $this->render( 'default/homepage.html.twig', [
            'name' => "Дефаулт",
            'greeting'=> "Привет"
        ]);
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug)
    {
        return $this->render( 'default/index.html.twig', [
            "name" => ucwords(str_replace('-',' ',$slug)),
            'greeting'=> 'Title'
        ]);
    }
}