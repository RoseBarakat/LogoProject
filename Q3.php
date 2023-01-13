<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>phpFile</title>
    <style type="text/css">

    </style>
</head>
<?php
// define variables and set to empty values
$favColor= "";
$valCookie ='white';
$H='hidden';
$V='visible';
$flag = false;
$flag2 = false;

if (isset($_COOKIE['favColor']))
{ $valCookie=$_COOKIE['favColor'];
    $flag = true;}
else
{
    $flag = false;}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["color"])) {
        $genderErr = "Gender is required";
    } else {
        $favColor = test_input($_POST["color"]);
        setcookie('favColor',$favColor );
        $valCookie=$favColor;
        $flag2=true;
        header("Refresh:0");
        $flag2=true;

    }

}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}
?>
<body style="background-color: <?php echo $valCookie ?>">
<span <?php if (!$flag) echo$H; ?>>
</span>

<span <?php if ($flag) echo$H; ?> >
    <dev >

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table>
            <tr>
                <td>Color:

     <input type='radio' name='color' <?php if (isset($favColor) && $favColor=="white") echo "checked";?> id='whiteCol' value='white' checked>white
    <input type='radio' name='color' <?php if (isset($favColor) && $favColor=="red") echo "checked";?> value='red' id='redCol'>red
    <input type='radio' name='color' <?php if (isset($favColor) && $favColor=="blue") echo "checked";?> value='blue' id='blueCol'>blue
    <input type='radio' name='color' <?php if (isset($favColor) && $favColor=="yellow") echo "checked";?> value='yellow' id='yellowCol'>yellow
    <input type='radio' name='color' <?php if (isset($favColor) && $favColor=="green") echo "checked";?> value='green' id='greenCol'>green
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="submit" value="Submit">
                </td>
            </tr>

        </table>
       </>
    </dev>



</span>


</body>

</html>