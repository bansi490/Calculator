<?php
/** 
 * @author          Bansi Joshi <bjoshi.490@gmail.com>
 * @Copyright       (c) 2021, Bansi Joshi. All Rights Reserved.
 * @Link            http://github.com/bansi490/
 */

include_once __DIR__."/../includes/common.php";

/** create log file for the calculator class */
$log = __DIR__."/../logs/".basename(__FILE__).".log";
ini_set('error_log', $log);


/**
 * Calculator
 */
class Calculator
{
    /**
    * The left-hand oprand of the calculation.
    *
    * @var float
    */
    private $num1;

    /**
    * The right-hand oprand of the calculation.
    *
    * @var float
    */
    private $num2;

    /**
    * The calculation operation like sum, sub, mul, div.
    *
    * @var string
    */
    private $oper;

    /**
    * The full calculation operation a + b = c
    *
    * @var string
    */
    private $summary;

    /**
    * The calculation answer
    *
    * @var string
    */    
    private $answer;
      
    /**
     * Calculatoer object constructor__construct
     *
     * @param  string $oper this opertation will perform between two numbers.
     * @param  float $a left oprands.
     * @param  float $b right oprands
     * @return void
     */
    public function __construct($oper, $a, $b)
    {
        $this->num1 = (float) $a;
        $this->num2 = (float) $b;
        $this->oper = (string) $oper;
    }
        
    /**
     * xmlOutput
     *
     * Return the summary & answer in XML format.
     * 
     * @return void
     */
    public function xmlOutput()
    {
        return
            '<output>
                <answer>' . $this->answer . '</answer>
                <summary>' . htmlspecialchars($this->summary) . '</summary>
            </output>';
    }
    
    /**
     * answer
     *
     * @return void
     */
    public function answer()
    {
        return $this->answer;
    }
    
    /**
     * summary
     *
     * @return void
     */
    public function summary()
    {
        return $this->summary;
    }

    /**
     * Calculator mathematics operation perform like addition, substraction, multiplication, division
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
     * 
     * @return void
     */
    public function insert(){

        global $db;

        /** Insert sql query */
        $sql = "INSERT INTO tbl_calculator (num1, num2, oper, answer)
                VALUES (" . $this->num1 .", " . $this->num2 . ", '" .$this->oper. "', " .$this->answer. " )";

        /** insert result maintain in log file */ 
        error_log($sql);

        if ($db->query($sql) === TRUE) {
            error_log("New record created successfully");
        } else {
            error_log("Error: " . $sql . "<br>" . $db->error);
        }
        return;
    }
}

