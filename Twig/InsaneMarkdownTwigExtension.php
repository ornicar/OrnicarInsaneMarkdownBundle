<?php

namespace Ornicar\InsaneMarkdownBundle\Twig;

use Ornicar\InsaneMarkdownBundle\InsaneMarkdown;

class InsaneMarkdownTwigExtension extends \Twig_Extension
{
    private $parser;

    public function __construct(InsaneMarkdown $parser)
    {
        $this->parser = $parser;
    }

    public function getFilters()
    {
        return array(
            'markdown' => new \Twig_Filter_Method($this, 'markdown', array('is_safe' => array('html'))),
        );
    }

    public function markdown($text)
    {
        return $this->parser->transform($text);
    }

    public function getName()
    {
        return 'markdown';
    }
}
