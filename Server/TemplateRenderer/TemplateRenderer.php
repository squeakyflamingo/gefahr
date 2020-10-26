<?php

namespace TemplateRenderer;

/**
 * Class TemplateRenderer
 * @package TemplateRenderer
 */
class TemplateRenderer
{
    /**
     * @var string
     */
    private $templateDirectory;

    /**
     * TemplateRenderer constructor.
     * @param string $templateDirectory
     */
    public function __construct(string $templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
    }

    /**
     * @param string $templateName
     * @param array $arguments
     * @return string
     */
    public function renderTemplate(string $templateName, array $arguments = []): string
    {
        ob_start();

        if (!empty($arguments)) {
            extract($arguments);
        }

        include("{$this->templateDirectory}/{$templateName}.tpl.php");

        return ob_get_clean();
    }
}