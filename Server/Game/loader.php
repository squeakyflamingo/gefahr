<?php
$files = [
    'api/API.php',
    'TemplateRenderer/TemplateRenderer.php',
    'TemplateRenderer/TemplateService.php',
    'Game/Game.php',
    'Game/GamefileManager.php',
];

foreach ($files as $file) {
    require_once $file;
}