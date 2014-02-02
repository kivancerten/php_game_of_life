<?php
class testFramework
{
    public static function assertEqual($v1, $v2)
    {
        if ($v1 == $v2) {
            echo "TEST OK";
        } else {
            echo "TEST FAIL ! expected:" . var_export($v1, true) . " given:" . var_export($v2, true);
        }
        echo "\n";
    }

    public static function assertTrue($v1)
    {
        if ($v1 === true) {
            echo "TEST OK";
        } else {
            echo "TEST FAIL ! expected:true given:" . var_export($v1, true);
        }
        echo "\n";
    }

    public static function assertFalse($v1)
    {
        if ($v1 === false) {
            echo "TEST OK";
        } else {
            echo "TEST FAIL ! expected:false given:" . var_export($v1, true);
        }
        echo "\n";
    }

}
