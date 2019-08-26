<?php


namespace App\Controller;

use App\Entity\Article;
use App\Service\MarkdownHelper;
use Doctrine\ORM\EntityManagerInterface;
use Michelf\MarkdownInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;
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
    public function show($slug, EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Article::class);

        /** @var Article $article */
        $article = $repository->findOneBy(['slug'=> $slug]);

        if(!$article){
            throw $this->createNotFoundException(sprintf('No article for slug %s', $slug));
        }





        return $this->render( 'default/article.html.twig', [
           'article' => $article,
            'slug'=> $slug
        ]);
    }

    /**
     * @Route("/news/{slug}/like", name="article_toggle_like", methods={"POST"})
     */
    public function toggleArticleLike($slug)
    {
        // TODO - like/unlike article with database and Ajax

        return new JsonResponse(["likes"=>rand(5, 100)]);
    }
}