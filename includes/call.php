<?php

/** 
 * @author          Bansi Joshi <bjoshi.490@gmail.com>
 * @Copyright       (c) 2021, Bansi Joshi. All Rights Reserved.
 * @Link            http://github.com/bansi490/
 */

include_once "common.php";
require_once __DIR__.'/../classes/Calculator.php';

// if the two oprands and operater found then perform the calculation 
if (isset($_GET['oper'], $_GET['num1'], $_GET['num2']))
{
    try
    {
        $obj_calc = new Calculator($_GET['oper'], $_GET['num1'], $_GET['num2']);     
        $obj_calc->exec();
        $obj_calc->insert();
        echo $obj_calc->xmlOutput();
    }
    catch (Exception $e)
    {
        error_log('Error: ', $e->getMessage() . PHP_EOL . PHP_EOL, FILE_APPEND); 
        return false;
    }
}