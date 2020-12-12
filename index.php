<?php

require_once(__DIR__.'/vendor/autoload.php');

use WebAndCow\Challenge\Game;

$myKey = 'API_KEY';
$challengeCode = 'FUTURE';

$game = new Game($myKey, $challengeCode);
$solution = new \WebAndCow\ChallengeBootstrap\Solution();
$result = $game->resolveWith($solution);

echo $result.PHP_EOL;
