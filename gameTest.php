<?php
include_once "testFramework.php";
include_once "Game.php";
include_once "BoardGeneratorStub.php";
include_once "BoardSpy.php";
use testFramework as phpTester;

$boardGenerator = new BoardGeneratorStub();
$board = new Board($boardGenerator);
$display = new Display();
$board->setDisplay($display);

phpTester::assertFalse($board->calculateNewStatusOfCell(cell::init(5,1)));
phpTester::assertTrue($board->calculateNewStatusOfCell(cell::init(5,2)));
phpTester::assertTrue($board->calculateNewStatusOfCell(cell::init(5,3)));
phpTester::assertTrue($board->calculateNewStatusOfCell(cell::init(5,4)));
phpTester::assertFalse($board->calculateNewStatusOfCell(cell::init(6,1)));
phpTester::assertTrue($board->calculateNewStatusOfCell(cell::init(6,2)));
phpTester::assertFalse($board->calculateNewStatusOfCell(cell::init(6,3)));
phpTester::assertFalse($board->calculateNewStatusOfCell(cell::init(6,4)));
phpTester::assertFalse($board->calculateNewStatusOfCell(cell::init(6,5)));

echo "New Generation tests : \n";
$board->newGeneration();

phpTester::assertFalse($board->calculateNewStatusOfCell(cell::init(5,1)));
phpTester::assertFalse($board->calculateNewStatusOfCell(cell::init(5,2)));
phpTester::assertTrue($board->calculateNewStatusOfCell(cell::init(5,3)));
phpTester::assertFalse($board->calculateNewStatusOfCell(cell::init(5,4)));
phpTester::assertTrue($board->calculateNewStatusOfCell(cell::init(6,1)));
phpTester::assertTrue($board->calculateNewStatusOfCell(cell::init(6,2)));
phpTester::assertFalse($board->calculateNewStatusOfCell(cell::init(6,3)));
phpTester::assertTrue($board->calculateNewStatusOfCell(cell::init(6,4)));
phpTester::assertFalse($board->calculateNewStatusOfCell(cell::init(6,5)));


