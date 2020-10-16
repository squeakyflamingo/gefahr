<?php
namespace Game;

class TemplateRenderer
{
    private $templateDirectory;

    public function __construct(string $templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
    }

    public function renderTemplate(string $templateName, array $arguments = [])
    {
        ob_start();

        if(!empty($arguments)){
            extract($arguments);
        }

        include("{$this->templateDirectory}/{$templateName}.tpl.php");
        return ob_get_clean();
    }
}