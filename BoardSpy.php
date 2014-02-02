<?php

class BoardSpy extends Board
{
    public $neighbours_of_cell = array();
    public $not_instance_of_cell;

    /**
     * @param Cell $cell
     *
     * @return bool
     */
    public function calculateNewStatusOfCell(Cell $cell)
    {
        $cells = $this->getNeighboursOfCell($cell);



        $liveNeighbourCount = 0;

        /** @var Cell $eachCell */
        foreach ($cells as $eachCell) {

            if (! $eachCell instanceof Cell) {
                $this->not_instance_of_cell = $eachCell;
            }

            if (true == $eachCell->getStatus()) {
                $liveNeighbourCount++;
            }
        }

        return $this->recognizeDestinyOfCell($cell, $liveNeighbourCount);
    }

    protected function getNeighboursOfCell(Cell $cell)
    {

        $xPoints = $this->getXNeighbourPointsOfCell($cell);
        $yPoints = $this->getYNeighbourPointsOfCell($cell);

        $cells = array();

        foreach ($xPoints as $eachX) {
            foreach ($yPoints as $eachY) {

                if ($eachX == $cell->getX() && $eachY == $cell->getY()) {
                    continue;
                }
                $cells[] = $this->boardMap[$eachX][$eachY];
            }
        }

        return $cells;
    }
}
