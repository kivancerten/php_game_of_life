<?php
require_once 'BoardGeneratorInterface.php';
require_once 'Cell.php';

class BoardGenerator implements BoardGeneratorInterface
{
    public function generate($maxX, $maxY)
    {
        $board = array();
        for ($s = 0; $s < $maxX; $s++) {
            for ($t = 0; $t < $maxY; $t++) {
                $cell = Cell::init($s, $t);
                if (rand(0, 1)) {
                    $cell->setStatus(true);
                }
                $board[$s][$t] = $cell;
            }
        }
        return $board;
    }
}
