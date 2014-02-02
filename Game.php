<?php
require_once 'Board.php';
require_once 'BoardInterface.php';
require_once 'Cell.php';
require_once 'Display.php';

class Game
{
    /** @var BoardInterface */
    private $board;

    /**
     * @param BoardInterface $board
     */
    function __construct(BoardInterface $board)
    {
        $this->board = $board;
    }

    public function start()
    {
        while (true) {
            $this->board->runDisplay();
            usleep(10000);
            $this->board->newGeneration();
        }

    }



}
