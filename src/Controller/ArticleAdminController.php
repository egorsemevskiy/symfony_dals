<?php


namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleAdminController extends AbstractController
{
    /**
     * @Route("/admin/article/new")
     */
    public function new(EntityManagerInterface $em)
    {
        $article = new Article();
        $articleTile = 'Why Im so smart and its hard to find job' . rand(1, 1000);

        $article->setTitle($articleTile)
            ->setSlug(str_replace(" ","-",strtolower($articleTile)))
            ->setContent(<<<EOF
**Lorem ipsum** dolor sit amet, consectetur adipiscing elit. Mauris nec leo molestie, finibus dolor in, condimentum augue. Morbi iaculis dignissim consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ut lorem sed nisl euismod pretium. Morbi at est bibendum, eleifend nisl facilisis, scelerisque augue. Donec a ex feugiat erat ullamcorper vehicula. Sed pretium tellus sit amet sem scelerisque pharetra. Donec malesuada diam id augue blandit, at cursus quam euismod. Duis finibus tellus id pretium pellentesque. Donec augue mauris, placerat et libero ut, hendrerit ornare magna. Integer sollicitudin vulputate massa, ullamcorper posuere risus eleifend vel. Mauris ullamcorper tellus et mauris elementum malesuada. Etiam commodo tincidunt dolor, sit amet eleifend nunc gravida nec. Sed in neque libero.

Ut [tincidunt](http://google.com) ante mauris, eget pellentesque est hendrerit in. Phasellus quis justo sed urna posuere rutrum eu quis risus. Pellentesque dapibus augue a ante commodo, eget efficitur neque scelerisque. Proin eget turpis auctor libero auctor aliquet ut in ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam id urna vitae felis dictum hendrerit. Proin rhoncus ac nisl eu euismod. Nulla ultrices orci ut tempus sodales. Nunc tincidunt convallis augue sit amet eleifend. Quisque mattis lobortis consectetur. Pellentesque aliquet tortor at dictum malesuada. Suspendisse nulla sapien, bibendum eu venenatis id, egestas non dui.
EOF
            );

        if(rand(1,10) > 2){
            $article->setPublishedAt(new \DateTime(sprintf('-%d days', rand(1,100))));
        }

        $em->persist($article);
        $em->flush();

        return new Response(sprintf('New article have id: # %d slug %s',$article->getId(),$article->getSlug()));
    }

}