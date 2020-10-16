<?php
$classes = [
    'Game/Game.php',
    'Game/XMLParser.php',
    'Game/TemplateRenderer.php',
];

foreach ($classes as $class) {
    require_once($class);
}