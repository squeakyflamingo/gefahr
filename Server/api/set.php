<?php
require_once ('API.php');

use Api\API;

$api = new API(true);

if ($api->getBuzzerState() == 'reset' && isset($_GET['team'])) {
    $api->setBuzzerState('team'.$_GET['team']);
} elseif (isset($_GET['reset'])) {
    $api->setBuzzerState('reset');
}

