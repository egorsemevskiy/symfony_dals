<?php


namespace App\Service;


use Michelf\Markdown;
use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class MarkdownHelper
{
    private $cache;

    private $markdown;

    private $logger;

    public function __construct(AdapterInterface $cache, MarkdownInterface $markdown, LoggerInterface $logger)
    {
        $this->cache = $cache;
        $this->markdown = $markdown;
        $this->logger = $logger;
    }

    public function parse(string $sourse): string
    {
        if(strpos($sourse, 'backon') !== false){
            $this->logger->info('they talking about backon again!');
        }
        $item = $this->cache->getItem('mardown_'.md5($sourse));
        if(! $item->isHit()){
            $item->set($this->markdown->transform($sourse));
            $this->cache->save($item);
        }

        return $item->get();
    }
}