<?php
namespace BuzzerClient;

use Api\API;
use TemplateRenderer\TemplateRenderer;

/**
 * Class BuzzerClient
 * @package BuzzerClient
 */
class BuzzerClient {
    /**
     * @var TemplateRenderer
     */
    private $renderer;

    /**
     * BuzzerClient constructor.
     */
    public function __construct()
    {
        $this->renderer = new TemplateRenderer(__DIR__ . '/templates');

        $api = new API();
        $GLOBALS['teams'] = $api->getConfigForClients();
    }

    /**
     * @return string
     */
    public function start(): string
    {
        if(isset($_POST['team'])) {
            $_SESSION['team'] = htmlspecialchars($_POST['team']);
        }

        if(isset($_SESSION['team'])) {
            return $this->renderer->renderTemplate('buzzer', [
                'team' => $_SESSION['team'],
                'teamname' => $GLOBALS['teams'][$_SESSION['team']]['name'],
            ]);
        }

        return $this->renderer->renderTemplate('chooseTeam');
    }
}