<?php
/** 
 * @author          Bansi Joshi <bjoshi.490@gmail.com>
 * @Copyright       (c) 2021, Bansi Joshi. All Rights Reserved.
 * @Link            http://github.com/bansi490/
 */

include_once __DIR__."/../includes/common.php";

$log = __DIR__."/../logs/".basename(__FILE__).".log";
ini_set('error_log', $log);

class Calculator
{
    private $num1, $num2, $summary, $answer, $oper;

    public function __construct($oper, $a, $b)
    {
        $this->num1 = (float) $a;
        $this->num2 = (float) $b;
        $this->oper = (string) $oper;
    }

    /**
     * Return the summary & answer. in XML format.
     */
    public function xmlOutput()
    {
        //header('Content-Type:text/xml'); // Set the XML header
        return
            '<output>
                <answer>' . $this->answer . '</answer>
                <summary>' . htmlspecialchars($this->summary) . '</summary>
            </output>';
    }

    public function answer()
    {
        return $this->answer;
    }

    public function summary()
    {
        return $this->summary;
    }

    /**
     * Calculator mathematics operation  
     */
    public function exec()
    {
        switch ($this->oper)
        {
            case 'add':
                $this->answer = ($this->num1+$this->num2);
                $this->summary = $this->num1 . ' + ' . $this->num2 . ' = ' . $this->answer;
            break;

            case 'sub':
                $this->answer = ($this->num1-$this->num2);
                $this->summary = $this->num1 . ' - ' . $this->num2 . ' = ' . $this->answer;
            break;

            case 'mul':
                $this->answer = ($this->num1*$this->num2);
                $this->summary = $this->num1 . ' * ' . $this->num2 . ' = ' . $this->answer;
            break;

            case 'div':
                $this->answer = ($this->num1/$this->num2);
                $this->summary = $this->num1 . ' / ' . $this->num2 . ' = ' . $this->answer;
            break;

            default:
                throw new InvalidArgumentException(sprintf('"%s" is an invalid operation.', str_replace('_', '', $this->oper)));
        }
    }

    /**
     * Calculator mathematics operation insert into database table called: tbl_calculator
     */
    public function insert(){

        global $db;

        $sql = "INSERT INTO tbl_calculator (num1, num2, oper, answer)
                VALUES (" . $this->num1 .", " . $this->num2 . ", '" .$this->oper. "', " .$this->answer. " )";

        // insert result maintain in log file
        error_log($sql);

        if ($db->query($sql) === TRUE) {
            error_log("New record created successfully");
        } else {
            error_log("Error: " . $sql . "<br>" . $db->error);
        }
        return;
    }
}

