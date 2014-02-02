<?php
require_once 'BoardInterface.php';
require_once 'BoardGenerator.php';
require_once 'Cell.php';

class Board implements BoardInterface
{
    const MAX_X = 50;
    const MAX_Y = 50;

    /** @var array */
    protected $boardMap;

    /** @var Display */
    private $display;

    /** @var BoardGeneratorInterface */
    private $boardGenerator;

    /**
     * @param BoardGeneratorInterface $boardGenerator
     */
    public function __construct(BoardGeneratorInterface $boardGenerator)
    {
        $this->boardGenerator = $boardGenerator;
        $this->boardMap = $this->boardGenerator->generate(self::MAX_X, self::MAX_Y);
    }

    public function newGeneration()
    {
        foreach ($this->boardMap as $lines) {
            foreach ($lines as $cell) {
                /** @var Cell $cell */
                $cell->setNextStatus($this->calculateNewStatusOfCell($cell));
            }
        }

        foreach ($this->boardMap as $lines) {
            foreach ($lines as $cell) {
                /** @var Cell $cell */
                $cell->setStatus($cell->getNextStatus());
            }
        }
    }

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
            if (true == $eachCell->getStatus()) {
                $liveNeighbourCount++;
            }
        }

        return $this->recognizeDestinyOfCell($cell, $liveNeighbourCount);
    }

    /**
     * @param Cell $cell
     * @param      $liveNeighbourCount
     *
     * @return bool
     */
    protected function recognizeDestinyOfCell(Cell $cell, $liveNeighbourCount)
    {
        // Live Cell
        if (true == $cell->getStatus()) {

            return $this->recognizeDestinyOfLiveCell($liveNeighbourCount);

        } else { // Dead Cell

            return $this->recognizeDestinyOfDeadCell($liveNeighbourCount);
        }
    }

    /**
     * @param $liveNeighbourCount
     *
     * @return bool
     */
    private function recognizeDestinyOfDeadCell($liveNeighbourCount)
    {
        if ($liveNeighbourCount == 3) {
            //Welcome come to the world baby;
            return true;
        }

        return false;
    }

    /**
     * @param $liveNeighbourCount
     *
     * @return bool
     */
    private function recognizeDestinyOfLiveCell($liveNeighbourCount)
    {
        if ($liveNeighbourCount < 2) {
            //Next time you gonna be king
            return false;
        }

        if ($liveNeighbourCount > 3) {
            return false;
        }
        return true;
    }

    /**
     * @param Cell $cell
     *
     * @return array
     */
    protected function getXNeighbourPointsOfCell(Cell $cell)
    {
        $sameX = $cell->getX();
        $leftX = $sameX - 1;
        $rightX = $sameX + 1;

        $xPoints = array();
        $xPoints[] = $sameX;

        if ($leftX >= 0) {
            $xPoints[] = $leftX;
        }

        if ($rightX < self::MAX_X) {
            $xPoints[] = $rightX;
        }

        return $xPoints;
    }

    /**
     * @param Cell $cell
     *
     * @return array
     */
    protected function getYNeighbourPointsOfCell(Cell $cell)
    {
        $sameY = $cell->getY();
        $topY = $sameY - 1;
        $bottomY = $sameY + 1;

        $yPoints = array();

        $yPoints[] = $sameY;

        if ($topY >= 0) {
            $yPoints[] = $topY;
        }

        if ($bottomY < self::MAX_Y) {
            $yPoints[] = $bottomY;
        }

        return $yPoints;
    }

    /**
     * @param Cell $cell
     *
     * @return array
     */
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

    /**
     * @param \Display $display
     */
    public function setDisplay($display)
    {
        $this->display = $display;
    }

    public function runDisplay()
    {
        $this->display->printToScreen($this->boardMap);
    }


}
