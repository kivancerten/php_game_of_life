<?php

interface BoardInterface
{
    /**
     * @param BoardGeneratorInterface $boardGenerator
     */
    public function __construct(BoardGeneratorInterface $boardGenerator);

    /**
     * @param Cell $cell
     *
     * @return boolean
     */
    public function calculateNewStatusOfCell(Cell $cell);

    public function newGeneration();

    public function runDisplay();
}
