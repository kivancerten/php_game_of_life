<?php
include_once "Game.php";

$boardGenerator = new BoardGenerator();
$board = new Board($boardGenerator);
$display = new Display();
$board->setDisplay($display);

$game = new Game($board);
$game->start();