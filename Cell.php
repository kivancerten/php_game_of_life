<?php
class Cell
{
    /** @var Integer */
    private $x;
    /** @var Integer */
    private $y;
    /** @var boolean */
    private $status = false;
    /** @var boolean */
    private $nextStatus = false;

    static function init($x, $y)
    {
        $cell = new Cell($x, $y);
        $cell->x = $x;
        $cell->y = $y;
        return $cell;
    }

    /**
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param boolean $nextStatus
     */
    public function setNextStatus($nextStatus)
    {
        $this->nextStatus = $nextStatus;
    }

    /**
     * @return boolean
     */
    public function getNextStatus()
    {
        return $this->nextStatus;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

}
