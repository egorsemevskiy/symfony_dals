<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\Response;

use App\GreetingGenerator;


class HelloController extends AbstractController
{
    /**
     * @Route("/hello/{name}")
     */
    public function index($name, LoggerInterface $logger, GreetingGenerator $generator)
    {
        $greeting = $generator->getRandomGreeting();

        $logger->info("Saying $greeting to $name!");

        return $this->render( 'default/index.html.twig', [
            'name' => $name,
            'greeting'=> $greeting
            ]);
    }

    /**
     * @Route("/simplicity")
     */
    public function simple()
    {
        return new Response('Просто! Легко! Прекрасно!');
    }


}