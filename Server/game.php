<?php
require_once("Game/loader.php");

use Game\XMLParser;
use Game\Game;

$xmlParser = new XMLParser('../Spiele');
$xmlData = $xmlParser->loadXmlAsArray('Testspiel');

$game = new Game($xmlData);
echo $game->start();