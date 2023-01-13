<?php
$valid_member = 0;
$HeIsClient=0;
$Email="";
if(isset($_POST['Eamil']) && isset($_POST['Password'])){ $_em=$_POST['Eamil'];
    $db = new mysqli('localhost','root','','webpro');
    if(mysqli_connect_errno()){
        echo "Error: could not connect to database ";
        die();
    }



    $qry = 'select * from useraccount';
    $res = $db -> query($qry);

    for($i=0 ;$i < $res -> num_rows;$i++)
    {
        $row = $res ->fetch_array();
        if($_POST['Eamil'] == $row['Email'] && $_POST['Password'] == $row['Password']){
            $valid_member = 1;
            echo "DONE ";

            //valid member
        }
    }
    if($valid_member == 0){
        echo "wrong user name or password ";
    }
   else if($valid_member==1){
        $qry1 = 'select * from client';
        $res1 = $db -> query($qry1);
        for($i=0 ;$i < $res1 -> num_rows;$i++)
        {
            $row1= $res1->fetch_array();
            echo $row1['Email'];
            if( $_em==$row1['Email']){
                $HeIsClient=1;
                echo "DONE ";
            }
}if($HeIsClient==1){
            echo"IsClient";
            header("location:Client.php");
        }
        else{ echo "he is designer";
            header("location:Designer.php");
        };
    //not valid member
}}
if(isset($_POST['Email'])){
    session_start();
    $Email=$_POST['Email'];
    $_SESSION['Email']=$Email;
    $servername = "localhost";
    $Usernme = "root";
    $password = "";
    $dbname = "webpro";
    $Email=$_POST['Email'];
    $ppassword=$_POST['Passwordd'];
    $ConfirmPass=$_POST['ConfirmPass'];
    $conn = new mysqli($servername, $Usernme, $password, $dbname);
    if($ppassword == $ConfirmPass){
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO useraccount (Email,Password)
        VALUES ('$Email','$ppassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Done!", ", Your account is created!", "success";
        header("Location:SignUpClientOrDesigner.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    }
    else{
        echo "Didnt matching";

    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>RT Logo Gate</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="lognicss.css">
</head>

<body>
<div class="circle2"></div> <div class="circle"></div>
<div class="lors">
    <p>
    <h1>Hi </h1>
    Welcome to <br> <b>RT Logo Gate</b><br>Have your brand logo with us
    </p>

    <br>
    <br>
    <br>
    <br>
    <br>

    <button onclick="l()">Log In</button><br>
    <button onclick="s()">Sign In</button><br>
</div>
<div class="login" id="login">

    <h1> Log In </h1><br>
    <FORM action="LOGIN.php" method="post">
        <br>
        <br>
        <input type="text" id="Eamil" name="Eamil" placeholder="Enter Eamil">
        <input type="password" id="Password" name="Password" placeholder="Enter Password">
        <input type="submit" name="" value="Log In"><br>
        <a data-toggle="modal" data-target="#myModal" onclick="">Forget Password ?</a><br>
    </FORM>
</div>
<div class="sign" id="sign">
    <h1> Sign In </h1><br>
    <form action="LOGIN.php" METHOD="post" >
        <input type="text" placeholder="Enter Eamil" name="Email" required>
        <br>
        <input type="password" name="Passwordd" placeholder="Enter Password"required ><br>
        <input type="password" name="ConfirmPass" placeholder="Confirm Password" required><br>
        <input type="submit" name="Submit" value="Sign In"><br>
    </form>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>



</body>
<script>

    function s(){
        let x = document.getElementById("sign");
        x.style.display = 'block';
        document.getElementById("sign").style.transition =' 1s ease-in-out';
        document.getElementById("login").style.display = 'none';

    }
    function l(){
        let x = document.getElementById("sign");
        x.style.display = 'none';
        document.getElementById("login").style.display ='block';

    }

</script>
</html>