<?php

namespace App\Service;

use Symfony\Contracts\Cache\CacheInterface;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

class MarkdownHelper {

    private $markdownParser;
    private $cahce;

    public function __construct(MarkdownParserInterface $markdownParser, CacheInterface $cache) {
        $this->markdownParser = $markdownParser;
        $this->cache = $cache;
    }

    public function parse(string $input): string {
        return $this->cache->get('markdown_'.md5($input), function() use ($input) {
            return $this->markdownParser->transformMarkdown($input);
        });
    }
}