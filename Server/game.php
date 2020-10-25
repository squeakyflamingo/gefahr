<?php
require_once("Game/loader.php");

use Game\Game;

$game = new Game();
echo $game->start();