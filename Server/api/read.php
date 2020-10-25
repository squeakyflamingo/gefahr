<?php
require_once 'API.php';

use Api\API;

$api = new API(true);

echo $api->getBuzzerState();