<?php
namespace BuzzerClient;

use TemplateRenderer\TemplateRenderer;

class BuzzerClient {
    private $renderer;

    public function __construct()
    {
        $this->renderer = new TemplateRenderer(__DIR__ . '/templates');
    }

    public function start(): string
    {
        if(isset($_POST['team'])) {
            $_SESSION['team'] = htmlspecialchars($_POST['team']);
        }

        if(isset($_SESSION['team'])) {
            return $this->renderer->renderTemplate('buzzer', [
                'team' => $_SESSION['team'],
                'teamname' => $GLOBALS['teamnamen'][$_SESSION['team']],
            ]);
        }
        

        return $this->renderer->renderTemplate('chooseTeam');
    }
}