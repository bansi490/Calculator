<?php
/** 
 * @author          Bansi Joshi <bjoshi.490@gmail.com>
 * @Copyright       (c) 2021, Bansi Joshi. All Rights Reserved.
 * @Link            http://github.com/bansi490/
 */

include_once __DIR__."/../includes/common.php";

$log = __DIR__."./logs/".basename(__FILE__).".log";
ini_set('error_log', $log);

class Calc_history
{
    // public function __construct()
    // {
    //     $this->select();
    // }

    public function select(){

        global $db;

        $result = $db->query("SELECT * FROM `tbl_calculator` ORDER BY id DESC limit 10");
       
        if ($result->num_rows > 0) {
            // output data of each row
            // $i = 0;
            while($row = $result->fetch_assoc()) {
               
                //  var_dump($row);
                //  exit;
                $s = '';
                switch($row["oper"]){
                    case 'add':
                        $s = '+';
                        break;
                    case 'sub':
                        $s = '-';
                        break;
                    case 'mul':
                        $s = '*';
                        break;
                    case 'div':
                        $s = '/';
                        break;
                }
                $res[] = $row["num1"]. ' ' . $s. ' ' . $row["num2"]. ' =  ' . $row["answer"];
            }
            
            return $res;
        } else {
            echo "0 results";
        }        
    }
}