<?php

namespace Ornicar\InsaneMarkdownBundle;

use Symfony\Component\Process\ExecutableFinder;

class InsaneMarkdown
{
    private $path;

    public function __construct($path = null)
    {
        if ($path) {
            $this->path = $path;
        } else {
            $finder = new ExecutableFinder();
            $this->path = $finder->find('markdown');
        }
    }

    public function transform($string)
    {
        return shell_exec(sprintf('echo %s | %s', escapeshellarg($string), $this->path));
    }
}
