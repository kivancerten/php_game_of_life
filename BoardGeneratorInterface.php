<?php
interface BoardGeneratorInterface
{
    /**
     * @param Integer $maxX
     * @param Integer $maxY
     *
     * @return array
     */
    public function generate($maxX, $maxY);
}
