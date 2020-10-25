<?php
$files = [
    'api/API.php',
    'TemplateRenderer/TemplateRenderer.php',
    'BuzzerClient/BuzzerClient.php',
];

foreach ($files as $file) {
    require_once($file);
}