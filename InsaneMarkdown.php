<?php

namespace Ornicar\InsaneMarkdownBundle;

/**
 * Markdown parser.
 * Delegates the parsing to an executable.
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 */
class InsaneMarkdown
{
    /**
     * The markdown executable path
     *
     * @var string
     */
    private $path;

    /**
     * @param string the markdown executable path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Transform markdown text to HTML
     *
     * @param string $text the markdown text
     * @return string the produced HTML
     */
    public function transform($text)
    {
        return shell_exec(sprintf('echo %s | %s', escapeshellarg($text), $this->path));
    }
}
