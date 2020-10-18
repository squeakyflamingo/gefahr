<?php
$files = [
    '../Spiele/Teamnamen.php',
    'TemplateRenderer/TemplateRenderer.php',
    'Game/Game.php',
    'Game/XMLParser.php',
];

foreach ($files as $file) {
    require_once($file);
}