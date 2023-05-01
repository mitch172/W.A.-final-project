<?php
    // The variable $_SESSION["result"] is the value shown at the top of the calculator
    // If the value of $_SESSION["result"] is null set it to 0, otherwise leave it as is
    // This checks every time the page is reloaded as buttons are pressed
    session_start();
    if(isset($_SESSION["result"])) {
        $_SESSION["result"] = $_SESSION["result"];
    } else {
        $_SESSION["result"] = 0;
    }
    
    // Array used for storing history of calculations
    if(isset($_SESSION["history"])) {
        $_SESSION["history"] = $_SESSION["history"];
        $_SESSION["history_results"] = $_SESSION["history_results"];
    } else {
        $_SESSION["history"] = array();
        $_SESSION["history_results"] = array();
    }

    //String of hexadecimal valus
    $hexValues = "0123456789abcdef";
    //Binary values
    $hexBinValues= array('0'=>"0000",'1'=>"0001",'2'=>"0010",'3'=>"0011",'4'=>"0100",'5'=>"0101",'6'=>"0110", 
        '7'=>"0111",'8'=>"1000",'9'=>"1001",'A'=>"1010",'B'=>"1011",'C'=>"1100",'D'=>"1101",'E'=>"1110",'F'=>"1111");
   
    $binHexValues= array('0000'=>"0",'0001'=>"1",'0010'=>"2",'0011'=>"3",'0100'=>"4",'0101'=>"5",'0110'=>"6", 
    '0111'=>"7",'1000'=>"8",'1001'=>"9",'1010'=>"A",'1011'=>"B",'1100'=>"C",'1101'=>"D",'1110'=>"E",'1111'=>"F");
?>

<html>   
    <head>
        <title>Calculator</title>
        <style>
            body {
                background-color:beige;
            }

            table {
                width:50%;
                font-size:50px;
            }

            td {
                text-align:center;
            }

            button {
                width:150px;
                height:100px;
                font-size:30px;
                background-color:#bfbfbf;
                border-color:#737373;
            }

            .label {
                height:100px;
                background-color:#bfbfbf;
                border-style:solid;
                border-color:#737373;
            }

            a {
                text-decoration:none;
                color:black;
            }
        </style>
    </head>

    <body>
        <?php
            if(isset($_POST["clear"])) {
                $_SESSION["result"] = "Cleared";
            }

            // If the current value is 0 replace the 0 with the next input
            //Changeed from 0 to "clear" for binary input
            if($_SESSION["result"] == "Cleared") {
                if(isset($_POST["0"]) && $_SESSION["result"]!=0) {        //For binary conversions
                    $_SESSION["result"] = 0;
                }
                else if(isset($_POST["0"]) && $_SESSION["result"]=0) {        //For binary conversions
                    $_SESSION["result"] .= 0;
                }
                else if(isset($_POST["1"]) && $_SESSION["result"]=="Cleared") {
                    $_SESSION["result"] = 1;
                }
                else if(isset($_POST["1"]) && $_SESSION["result"]==0)
                {
                    $_SESSION["result"] .= 1;
                } else if(isset($_POST["2"])) {
                    $_SESSION["result"] = 2;
                } else if(isset($_POST["3"])) {
                    $_SESSION["result"] = 3;
                } else if(isset($_POST["4"])) {
                    $_SESSION["result"] = 4;
                } else if(isset($_POST["5"])) {
                    $_SESSION["result"] = 5;
                } else if(isset($_POST["6"])) {
                    $_SESSION["result"] = 6;
                } else if(isset($_POST["7"])) {
                    $_SESSION["result"] = 7;
                } else if(isset($_POST["8"])) {
                    $_SESSION["result"] = 8;
                } else if(isset($_POST["9"])) {
                    $_SESSION["result"] = 9;
                }
                else if(isset($_POST["A"])) {
                    $_SESSION["result"] = "A";
                } else if(isset($_POST["B"])) {
                    $_SESSION["result"] = "B";
                } else if(isset($_POST["C"])) {
                    $_SESSION["result"] = "C";
                } else if(isset($_POST["D"])) {
                    $_SESSION["result"] = "D";
                } else if(isset($_POST["E"])) {
                    $_SESSION["result"] = "E";
                } else if(isset($_POST["F"])) {
                    $_SESSION["result"] = "F";}  
                else if(isset($_POST["+"])) {
                    $_SESSION["result"] = $_SESSION["result"] .= "+";
                } else if(isset($_POST["-"])) {
                    $_SESSION["result"] = $_SESSION["result"] .= "-";
                } else if(isset($_POST["*"])) {
                    $_SESSION["result"] = $_SESSION["result"] .= "*";
                } else if(isset($_POST["/"])) {
                    $_SESSION["result"] = $_SESSION["result"] .=  "/";
                } else if(isset($_POST["dec"])) {
                    $_SESSION["result"] = $_SESSION["result"] .= ".";
                } else if(isset($_POST["^"])) {
                    $_SESSION["result"] = $_SESSION["result"] .=  "^";
                } else if(isset($_POST["sin"])) {
                    $_SESSION["result"] = "sin(" . $_SESSION["result"];
                } else if(isset($_POST["cos"])) {
                    $_SESSION["result"] = "cos(" . $_SESSION["result"];
                } else if(isset($_POST["tan"])) {
                    $_SESSION["result"] = "tan(" . $_SESSION["result"];
                } else if(isset($_POST["sqrt"])) {
                    $_SESSION["result"] = "sqrt(" . $_SESSION["result"];
                }

            // Otherwise, place the new input next to the current string
            } else {
                if(isset($_POST["0"])) {
                    $_SESSION["result"] .= 0;
                }
                else if(isset($_POST["1"])) {
                    $_SESSION["result"] .= 1;
                } else if(isset($_POST["2"])) {
                    $_SESSION["result"] .= 2;
                } else if(isset($_POST["3"])) {
                    $_SESSION["result"] .= 3;
                } else if(isset($_POST["4"])) {
                    $_SESSION["result"] .= 4;
                } else if(isset($_POST["5"])) {
                    $_SESSION["result"] .= 5;
                } else if(isset($_POST["6"])) {
                    $_SESSION["result"] .= 6;
                } else if(isset($_POST["7"])) {
                    $_SESSION["result"] .= 7;
                } else if(isset($_POST["8"])) {
                    $_SESSION["result"] .= 8;
                } else if(isset($_POST["9"])) {
                    $_SESSION["result"] .= 9;
                }  else if(isset($_POST["A"])) {
                    $_SESSION["result"] .= "A";
                } else if(isset($_POST["B"])) {
                    $_SESSION["result"] .= "B";
                } else if(isset($_POST["C"])) {
                    $_SESSION["result"] .= "C";
                } else if(isset($_POST["D"])) {
                    $_SESSION["result"] .= "D";
                } else if(isset($_POST["E"])) {
                    $_SESSION["result"] .= "E";
                } else if(isset($_POST["F"])) {
                    $_SESSION["result"] .= "F"; } 
                else if(isset($_POST["+"])) {
                    $_SESSION["result"] = $_SESSION["result"] .= "+";
                } else if(isset($_POST["-"])) {
                    $_SESSION["result"] = $_SESSION["result"] .= "-";
                } else if(isset($_POST["*"])) {
                    $_SESSION["result"] = $_SESSION["result"] .= "*";
                } else if(isset($_POST["/"])) {
                    $_SESSION["result"] = $_SESSION["result"] .=  "/";
                } else if(isset($_POST["^"])) {
                    $_SESSION["result"] = $_SESSION["result"] .=  "^";
                } else if(isset($_POST["back"])) {
                    $_SESSION["result"] = substr($_SESSION["result"], 0, strlen($_SESSION["result"]) - 1);
                } else if(isset($_POST["dec"])) {
                    $_SESSION["result"] = $_SESSION["result"] .=  ".";
                } else if(isset($_POST["inverse"])) {
                    array_push($_SESSION["history"], $_SESSION["result"]);
                    $_SESSION["result"] = 1 / $_SESSION["result"];
                    array_push($_SESSION["history_results"], $_SESSION["result"]);
                } else if(isset($_POST["sin"])) {
                    $_SESSION["result"] = "sin(" . $_SESSION["result"];
                } else if(isset($_POST["cos"])) {
                    $_SESSION["result"] = "cos(" . $_SESSION["result"];
                } else if(isset($_POST["tan"])) {
                    $_SESSION["result"] = "tan(" . $_SESSION["result"];
                } else if(isset($_POST["sqrt"])) {
                    $_SESSION["result"] = "sqrt(" . $_SESSION["result"];
                } else if(isset($_POST["neg"])) {
                    $_SESSION["result"] = -1 * $_SESSION["result"];
                }

                else if(isset($_POST["convBinToDec"])) 
                {
                    $resultStr= $_SESSION["result"];   //Temp val for result, $_SESSION[result][x] was throwing an error
                    //Checks for proper input, binary
                    if(preg_match("|[1]+[0]|",$resultStr))
                    {
                        //Calculate Binary To Decimal
                        array_push($_SESSION["history"], $_SESSION["result"]);
                        $decFromBin=0;
                        for($j=0; $j < strlen($_SESSION["result"]); $j++)
                        {
                            $pow = intval(strlen($_SESSION["result"])-1)-$j;        //calculate exponent 2^pow 
                            $decFromBin += intval(strval($resultStr[$j]))*pow(2,$pow);
                        }
                        $_SESSION["result"]=$decFromBin;
                        $strResult= "In Decimal: ".$_SESSION["result"];
                        array_push($_SESSION["history_results"],$strResult);
                    }
                    else  //Wrong input
                    {
                        $_SESSION["result"]= "Error: Non-binary number input";
                    }
                }
                else if(isset($_POST["convBinToHex"]))
                {
                    $resultStr= $_SESSION["result"];   //Temp val for result, $_SESSION[result][x] was throwing an error
                    if(preg_match("|[1]+[0]|",$resultStr))
                    {
                        //Calculate Binary To Hexadecimal
                        array_push($_SESSION["history"], $_SESSION["result"]);
                        if(strlen($resultStr)==0)
                        {
                            $_SESSION["result"]=0;
                        }
                        else if(strlen($resultStr)==1)
                        {
                            $temp="000".$resultStr;
                            $resultStr=$temp;
                        }
                        else if(strlen($resultStr)==2)
                        {
                            $temp="00".$resultStr;
                            $resultStr=$temp;
                        }
                        else if(strlen($resultStr)==3)
                        {
                            $temp="0".$resultStr;
                            $resultStr=$temp;
                        }
                        $hexFromBin="";
                        $bin=4;
                        $count=0;
                        $len=strlen($resultStr);
                        //While not last digit, make substrings of bits
                        while($count != $len)
                        {
                            $temp=substr($resultStr,$count,$count+4);
                            $hexFromBin .= $binHexValues[$temp];
                            $count+=4;
                        }
                        $_SESSION["result"]=$hexFromBin;
                        $strResult="In Hex: ".$_SESSION["result"];
                        array_push($_SESSION["history_results"],$strResult);
                    }
                    else  //Wrong input
                    {
                        $_SESSION["result"]= "Error: Non-binary number input";
                    }
                }
                else if(isset($_POST["convDecToBin"]))
                {
                    if(preg_match("|[0-9].*|",$_SESSION["result"]))
                    {
                        array_push($_SESSION["history"], $_SESSION["result"]);
                        $binFromDec="";
                        while($_SESSION["result"] > 0)
                        {
                            $binFromDec.=strval($_SESSION["result"]%2);
                            $_SESSION["result"]=$_SESSION["result"]/2;
                            if($_SESSION["result"] < 1)
                            {
                                $_SESSION["result"]=0;
                            }
                        }
                        $binReverse="";
                        for($i=strlen($binFromDec)-1;$i>=0;$i--)
                        {
                            $binReverse.=$binFromDec[$i];
                        }
                        $_SESSION["result"]=$binReverse;
                        $strResult="In Binary: ".$_SESSION["result"];
                        array_push($_SESSION["history_results"], $strResult);
                    }
                    else{
                        $_SESSION["result"]="Error: Non-decimal number input";
                    }
                } 
                else if(isset($_POST["convDecToHex"]))
                {
                    if(preg_match("|[0-9].*|",$_SESSION["result"]))
                    {
                        array_push($_SESSION["history"], $_SESSION["result"]);
                        $divRemain=array();
                        $hexFromDec="";
                        while($_SESSION["result"] > 0)
                        {
                            array_push($divRemain,($_SESSION["result"]%16));
                            $_SESSION["result"]=$_SESSION["result"]/16;
                            if($_SESSION["result"] < 1)
                            {
                                $_SESSION["result"]=0;
                            }
                        }
                        for($i=count($divRemain)-1;$i>=0;$i--)
                        {
                            $hexFromDec.=strpos($hexValues,$divRemain[$i]);
                        }
                        $_SESSION["result"]=$hexFromDec;
                        $strResult="In Hex: ".$_SESSION["result"];
                        array_push($_SESSION["history_results"],$strResult);
                    }
                    else{
                        $_SESSION["result"]="Error: Non-decimal number input";
                    }
                }
                else if(isset($_POST["convHexToDec"])) 
                {
                    $resultStr= $_SESSION["result"];   //Temp val for result, $_SESSION[result][x] was throwing an error
                    if(preg_match("|[A-Z].*|",$resultStr))
                    {
                        array_push($_SESSION["history"], $_SESSION["result"]);
                        $decFromHex=0;
                        for($i=0; $i < strlen($_SESSION["result"]); $i++)
                        {
                            $pow = intval(strlen($_SESSION["result"])-1)-$i;        //calculate exponent 2^pow 
                            $decFromHex += strpos($hexValues,$resultStr[$i])*pow(16,$pow);
                        }
                        $_SESSION["result"]=$decFromHex;
                        $strResult="In Decimal: ".$_SESSION["result"];
                        array_push($_SESSION["history_results"],$strResult);
                    }
                    else  //Wrong input
                    {
                        $_SESSION["result"]= "Error: Non-hexadecimal input";
                    }
                                
                }
                else if(isset($_POST["convHexToBin"]))
                {
                    $resultStr= $_SESSION["result"];   //Temp val for result, $_SESSION[result][x] was throwing an error
                    if(preg_match("|[a-zA-Z].*|",$resultStr))
                    {
                        array_push($_SESSION["history"], $_SESSION["result"]);
                        $binFromHex="";
                        for($i=0; $i < strlen($_SESSION["result"]); $i++)
                        {
                            $binFromHex .= $hexBinValues[$resultStr[$i]];
                        }
                        $_SESSION["result"]=$binFromHex;
                        $strResult="In Binary: ". $_SESSION["result"];
                        array_push($_SESSION["history_results"],$strResult);
                    }
                    else  //Wrong input
                    {
                        $_SESSION["result"]= "Error: Non-hexadecimal input";
                    }
                }

            }
            
            // If button pressed is "="
            if(isset($_POST["="])) {
                // Store current result value to history
                array_push($_SESSION["history"], $_SESSION["result"]);

                $array = str_split($_SESSION["result"]);

                // Find proper calculation
                for($i = 0; $i < count($array); $i++) {
                    if($array[$i] == "+") {
                        $first_half = substr($_SESSION["result"], 0, $i);
                        $second_half = substr($_SESSION["result"], $i + 1, strlen($_SESSION["result"]));
                        if($second_half != null) {
                            $_SESSION["result"] = $first_half + $second_half;
                        } else {
                            $_SESSION["result"] = "Error: no second value";
                        }
                    } else if($array[$i] == "-" && $array[0] != "-") {
                        $first_half = substr($_SESSION["result"], 0, $i);
                        $second_half = substr($_SESSION["result"], $i + 1, strlen($_SESSION["result"]));
                        if(is_numeric($second_half)) {
                            $_SESSION["result"] = $first_half - $second_half;
                        } else {
                            $_SESSION["result"] = "Error: no second value";
                        }
                    } else if($i != 0 && $array[$i] == "-" && $array[0] == "-" && is_numeric($array[$i - 1])) {
                        $first_half = substr($_SESSION["result"], 0, $i);
                        $second_half = substr($_SESSION["result"], $i + 1, strlen($_SESSION["result"]));
                        if(is_numeric($second_half)) {
                            $_SESSION["result"] = $first_half - $second_half;
                        } else {
                            $_SESSION["result"] = "Error: no second value";
                        }
                    } else if($array[$i] == "*") {
                        $first_half = substr($_SESSION["result"], 0, $i);
                        $second_half = substr($_SESSION["result"], $i + 1, strlen($_SESSION["result"]));
                        if(is_numeric($second_half)) {
                            $_SESSION["result"] = $first_half * $second_half;
                        } else {
                            $_SESSION["result"] = "Error: no second value";
                        }
                    } else if($array[$i] == "/") {
                        $first_half = substr($_SESSION["result"], 0, $i);
                        $second_half = substr($_SESSION["result"], $i + 1, strlen($_SESSION["result"]));
                        if($second_half == 0) {
                            $_SESSION["result"] = "Error: divide by 0";
                        } else if(!is_numeric($second_half)) {
                            $_SESSION["result"] = "Error: no second value";
                        } else {
                            $_SESSION["result"] = $first_half / $second_half;
                        }
                    } else if($array[$i] == "^") {
                        $first_half = substr($_SESSION["result"], 0, $i);
                        $second_half = substr($_SESSION["result"], $i + 1, strlen($_SESSION["result"]));
                        if(is_numeric($second_half)) {
                            $_SESSION["result"] = pow($first_half, $second_half);
                        } else {
                            $_SESSION["result"] = "Error: no second value";
                        }
                    } else if(str_contains($_SESSION["result"], "sin")) {
                        $val = intval(substr($_SESSION["result"], 4));
                        if(is_numeric($val)) {
                            $_SESSION["result"] = sin($val);
                        } else {
                            $_SESSION["result"] = "Error: no value input";
                        }
                    } else if(str_contains($_SESSION["result"], "cos")) {
                        $val = intval(substr($_SESSION["result"], 4));
                        if(is_numeric($val)) {
                            $_SESSION["result"] = cos($val);
                        } else {
                            $_SESSION["result"] = "Error: no value input";
                        }
                    } else if(str_contains($_SESSION["result"], "tan")) {
                        $val = intval(substr($_SESSION["result"], 4));
                        if(is_numeric($val)) {
                            $_SESSION["result"] = tan($val);
                        } else {
                            $_SESSION["result"] = "Error: no value input";
                        }
                    } else if(str_contains($_SESSION["result"], "sqrt")) {
                        $val = intval(substr($_SESSION["result"], 5));
                        if(is_numeric($val)) {
                            if($val >= 0) {
                                $_SESSION["result"] = sqrt($val);
                            } else {
                                $_SESSION["result"] = "Error: cannot find sqrt of negative";
                            }
                        } else {
                            $_SESSION["result"] = "Error: no value input";
                        }
                    }
                }

                // After math is complete, push result into history results
                array_push($_SESSION["history_results"], $_SESSION["result"]);
            }
        ?>

        <center>
            <!-- Each time any button is pressed, the form is submitted with the value 
            of the given button being reloaded into this page as it refreshes -->
            <form action="calculator.php" method="post">
                <table>
                    <tr>
                        <td colspan="6" class="label">
                            <?php
                                echo $_SESSION["result"];
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td><button type="submit" name="dec" id="dec">.</button></td>
                        <td><button type="submit" name="7" id="7">7</button></td>
                        <td><button type="submit" name="8" id="8">8</button></td>
                        <td><button type="submit" name="9" id="9">9</button></td>
                        <td><button type="submit" name="sin" id="sin">sin</button></td>
                        <td><button type="submit" name="*" id="*">*</button></td>
                    </tr>
                    
                    <tr>
                        <td><button type="submit" name="sqrt" id="sqrt">sqrt</button></td>
                        <td><button type="submit" name="4" id="4">4</button></td>
                        <td><button type="submit" name="5" id="5">5</button></td>
                        <td><button type="submit" name="6" id="6">6</button></td>
                        <td><button type="submit" name="cos" id="cos">cos</button></td>
                        <td><button type="submit" name="-" id="-">-</button></td>
                    </tr>

                    <tr>
                        <td><button type="submit" name="^" id="^">^</button></td>
                        <td><button type="submit" name="1" id="1">1</button></td>
                        <td><button type="submit" name="2" id="2">2</button></td>
                        <td><button type="submit" name="3" id="3">3</button></td>
                        <td><button type="submit" name="tan" id="tan">tan</button></td>
                        <td><button type="submit" name="+" id="+">+</button></td>
                    </tr>

                    <tr>
                        <td><button type="submit" name="A" id="A">A</button></td>
                        <td><button type="submit" name="B" id="B">B</button></td>
                        <td><button type="submit" name="C" id="A">C</button></td>
                        <td><button type="submit" name="D" id="A">D</button></td>
                        <td><button type="submit" name="E" id="A">E</button></td>
                        <td><button type="submit" name="F" id="A">F</button></td>
                    </tr>

                    <tr>
                        <td><button type="submit" name="inverse" id="inverse">1/x</button></td>
                        <td><button type="submit" name="clear" id="clear">C</button></td>
                        <td><button type="submit" name="0" id="0">0</button></td>
                        <td><button type="submit" name="back" id="back"><-</button></td>
                        <td><button type="submit" name="=" id="=">=</button></td>
                        <td><button type="submit" name="/" id="/">/</button></td>
                    </tr>

                    <tr>
                        <td colspan="2"><button style="width:3in;" type="submit" name="convDecToBin" id="convDecToBin">Convert Decimal To Binary</button></td>
                        <td colspan="2"><button style="width:3in;" type="submit" name="convBinToDec" id="convBinToDec">Convert Binary To Decimal</button></td>
                        <td colspan="2"><button style="width:3in;" type="submit" name="convBinToHex" id="convBinToHex">Convert Binary To Hexadecimal</button></td>
                    </tr>

                    <tr>
                        <td colspan="5" class="label"><a href="history.php" target="_blank">history</a></td>
                        <td><button type="submit" name="neg" id="neg">+/-</button></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>