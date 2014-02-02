<?php
class BoardGeneratorStub implements BoardGeneratorInterface
{
    /**
     * @param Integer $maxX
     * @param Integer $maxY
     *
     * @return array
     */
    public function generate($maxX, $maxY)
    {
        $board = array();
        for ($s = 0; $s < $maxX; $s++) {
            for ($t = 0; $t < $maxY; $t++) {
                $cell = Cell::init($s, $t);
                $board[$s][$t] = $cell;
            }
        }

        $board[5][3]->setStatus(true);
        $board[6][3]->setStatus(true);
        $board[6][2]->setStatus(true);
        $board[7][3]->setStatus(true);
        $board[6][4]->setStatus(true);
        $board[7][4]->setStatus(true);
        $board[8][5]->setStatus(true);
        $board[11][5]->setStatus(true);

        $board[2][2]->setStatus(true);
        $board[2][3]->setStatus(true);


        return $board;
    }


}
