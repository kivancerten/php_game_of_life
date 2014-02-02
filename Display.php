<?php
class Display
{
    public function printToScreen(array $boardMap)
    {
        $this->replaceOut($this->generateOutput($boardMap));
    }

    /**
     * @param array $boardMap
     *
     * @return string
     */
    private function generateOutput(array $boardMap)
    {
        $output = '';

        foreach ($boardMap as $eachLine) {
            /** @var Cell $eachCell */
            foreach ($eachLine as $eachCell) {

                //'█';
                if ($eachCell->getStatus()) {
                    $output .= '▓';
                } else {
                    $output .= '░';
                }
            }
            $output .= "\n";
        }

        return $output;
    }

    /**
     * @param String $str
     */
    private function replaceOut($str)
    {
        $numNewLines = substr_count($str, "\n");
        echo chr(27) . "[0G"; // Set cursor to first column
        echo $str;
        echo chr(27) . "[" . $numNewLines ."A"; // Set cursor up x lines
    }
}
