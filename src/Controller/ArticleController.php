<?php


namespace App\Controller;

use App\Service\MarkdownHelper;
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
    public function show($slug, MarkdownHelper $markdownHelper)
    {
        $articleContent =  <<<EOF
**Lorem ipsum** dolor sit amet, consectetur adipiscing elit. Mauris nec leo molestie, finibus dolor in, condimentum augue. Morbi iaculis dignissim consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ut lorem sed nisl euismod pretium. Morbi at est bibendum, eleifend nisl facilisis, scelerisque augue. Donec a ex feugiat erat ullamcorper vehicula. Sed pretium tellus sit amet sem scelerisque pharetra. Donec malesuada diam id augue blandit, at cursus quam euismod. Duis finibus tellus id pretium pellentesque. Donec augue mauris, placerat et libero ut, hendrerit ornare magna. Integer sollicitudin vulputate massa, ullamcorper posuere risus eleifend vel. Mauris ullamcorper tellus et mauris elementum malesuada. Etiam commodo tincidunt dolor, sit amet eleifend nunc gravida nec. Sed in neque libero.

Ut [tincidunt](http://google.com) ante mauris, eget pellentesque est hendrerit in. Phasellus quis justo sed urna posuere rutrum eu quis risus. Pellentesque dapibus augue a ante commodo, eget efficitur neque scelerisque. Proin eget turpis auctor libero auctor aliquet ut in ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam id urna vitae felis dictum hendrerit. Proin rhoncus ac nisl eu euismod. Nulla ultrices orci ut tempus sodales. Nunc tincidunt convallis augue sit amet eleifend. Quisque mattis lobortis consectetur. Pellentesque aliquet tortor at dictum malesuada. Suspendisse nulla sapien, bibendum eu venenatis id, egestas non dui.
EOF;


        $articleContent = $markdownHelper->parse($articleContent);

        return $this->render( 'default/article.html.twig', [
            "name" => ucwords(str_replace('-',' ',$slug)),
            "articleContent" => $articleContent,
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

        return new JsonResponse(["likes"=>rand(5, 100)]);
    }
}