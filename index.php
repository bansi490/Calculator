<!--  
 * @author          Bansi Joshi <bjoshi.490@gmail.com>
 * @Copyright       (c) 2021, Bansi Joshi. All Rights Reserved.
 * @Link            http://github.com/bansi490/
 * -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calculator</title>
        <link rel="stylesheet" href="./css/common.css" />
    </head>
    <body>

        <div class="container" role="main">

        <header>
            <section class="hero-unit">
                <h1>Basic Calculator</h1>
                <hr/>
                <p> This is a basic calculator which can perform basic mathematics function like addition, subtraction, multiplication and division. It can also store the last 10 operations. 
                </p>
            </section>
        </header>

        <section>

            <form name="calculator" method="get" class="form-inline">
                <p><label for="left_operand">Left-hand Operand</label>
                <input type="number" name="num1" id="num1" required="required" /></p>

                <p><label for="operation">Operation</label>
                <select name="oper" id="oper">
                    <option value="add">+</option>
                    <option value="sub">-</option>
                    <option value="mul">*</option>
                    <option value="div">/</option>
                </select>
                </p>

                <p><label for="right_operand">Right-hand Operand</label>
                <input type="number" name="num2" id="num2" required="required" /></p>
     
                <p><input type="button" id="submit" value="Calculate"/></p>
            </form>

            <hr />

            <p>
                <H1> <span id="answer"></span></H1>
                Result: <span id="summary"></span><br />
                 <span id="root"></span>
            </p>

            <H3>History</H3>
            <?php
            include_once __DIR__.'./classes/Calc_history.php';
            ini_set('display_errors','On');

            $obj = new Calc_history();

            $result = $obj->select();
            ?>
            <center>
                <table>
                    <?php foreach($result AS $row) { 
                    echo '<tr>
                    <td>'. $row . '</td>
                    </tr>';
                    }
                    ?>
                </table>
            </center>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="./scripts/ajax.js"></script>
    </body>
</html>
