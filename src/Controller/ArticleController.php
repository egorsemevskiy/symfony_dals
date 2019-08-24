<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
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
        return $this->render( 'default/article.html.twig', [
            "name" => ucwords(str_replace('-',' ',$slug)),
            'greeting'=> 'Title',
            'slug'=> $slug
        ]);
    }

    /**
     * @Route("/news/{slug}/like", name="article_toggle_like", methods={"POST"})
     */
    public function toggleArticleLike($slug)
    {
        // TODO - like/unlike article with database and Ajax

        return new JsonResponse(["like"=>rand(5, 100)]);
    }
}