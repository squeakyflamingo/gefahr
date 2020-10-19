<?php
$files = [
    '../Spiele/Konfiguration.php',
    'TemplateRenderer/TemplateRenderer.php',
    'BuzzerClient/BuzzerClient.php',
];

foreach ($files as $file) {
    require_once($file);
}