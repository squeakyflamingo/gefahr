<?php
require_once("BuzzerClient/loader.php");

use BuzzerClient\BuzzerClient;

$buzzerClient = new BuzzerClient();
echo $buzzerClient->start();