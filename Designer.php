<?php
session_start();
$profilepic ="";
$phonenumber =0;
$location ="";
$education ="";
$rate =0;
$bio ="";
$PROFILENAME="";
$gender ="";
$bd="";
$Email=$_POST['Eamil'];
$_SESSION['Eamil']=$Email;
@$db = new mysqli('localhost','root','','rtlogogate');
$qry = 'select * from desigener';
$res = $db -> query($qry);
for($i=0 ;$i < $res -> num_rows;$i++) {
    $row = $res->fetch_array();
    if ($_POST['Eamil'] == $row[3] ) {
//EMAIL IS EXIST
        $profilepic =$row[9];
        $phonenumber =$row[7];
        $location =$row[2]."/".$row[1];
        $bio =$row[8];
        $PROFILENAME =$row[4]." ".$row[6];
        $gender=$row[5];
        $education =$row[10];
        $rate =$row[11];
        $bd=$row[0];
    }

}
$qry = 'select * from logo';
$res = $db -> query($qry);
for($i=0 ;$i < $res -> num_rows;$i++) {
    $row = $res->fetch_array();
    if ($_POST['Eamil'] == $row[3] ) {
//EMAIL IS EXIST now get logo information
        $profilepic =$row[9];
        $phonenumber =$row[7];
        $location =$row[2]."/".$row[1];
        $bio =$row[8];
        $PROFILENAME =$row[4]." ".$row[6];
        $gender=$row[5];
        $education =$row[10];
        $rate =$row[11];
        $bd=$row[0];
    }

}
if (isset($_POST['name'])) {
    $target_file="uploads/";
    $file=$_FILES['file'];
    $filename = $_FILES["file"]["name"];
    $fileTmpname = $_FILES["file"]["tmp_name"];
    $fileSize = $_FILES["file"]["size"];
    $fileError = $_FILES["file"]["error"];
    $fileType = $_FILES["file"]["type"];
    $fileExt=explode('.',$filename);
    $fileActual_Ext=strtolower(end($fileExt));
    $allowed= array('jpg','jpeg','png');
    if(in_array($fileActual_Ext,$allowed)){
        if($fileError ===0){
            if($fileSize<3000000){
                $fillnewname=$filename;
                $fileDestination='uploads/'.$fillnewname;
                move_uploaded_file( $fileTmpname,$fileDestination);
                $base= $target_file.$filename;

            }
            else{
                echo "Your file is too big";
            }
        }
        else{
            echo "there was an error";
        }
    }

    $servername = "localhost";
    $Usernme = "root";
    $password = "";
    $dbname = "rtlogogate";
    $Name = $_POST['Name'];
    $Code = $_POST['NumCode'];
    $radioVal = $_POST["radio"];
    $State = "";
    $select = $_POST['Field'];
    $field = "";
    $Description = $_POST['Des'];
    if ($radioVal == "Free") {
        $State = "Free";
    } else if ($radioVal == "Paied") {
        $State = "Paied";
    }
    $salary = (float)$_POST['Salary'];
    if ($select == "Medicine") {
        $field = "Medicine";
    }
    if ($select == "Education") {
        $field = "Education";
    }
    if ($select == "Sport") {
        $field = "Sport";
    }

    $conn = new mysqli($servername, $Usernme, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO logo (CodeNum,Type,Field,Description,Salary,Name,UrlLogo)
        VALUES ('$Code','$State','$field','$Description','$salary','$Name','$base')";

    if ($conn->query($sql) === TRUE) {
        echo "shard";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="designercss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>


    </style>

</head>
<script>
    function l(){
        let x = document.getElementById("circlehid");
        x.style.display = 'block';

    }
</script>
<body >
<nav class="navbar navbar-inverse" style="background-color: #e9e9e9; color: black; border: 0 none" >
    <div class="container-fluid">
        <div class="navbar-header" style="padding-top: 16px">
            <a class="navbar-brand" href="#"style="color: #000000">ROTA</a>
        </div>
        <ul class="nav navbar-nav" style="padding-top: 10px">
            <li ><a href="Designer.php" style="color: #000000"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> &nbsp;&nbsp; </a></li>
            <li><a href="#" style="color: #000000"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-chat-right-dots-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg></a> &nbsp;&nbsp;  </li>
            <li><a href="Information.php" style="color: #000000">My information </a></li>
            <li><a href="index.php" style="color: #000000"  ><i class="fas fa-bell"></i></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right"  style="padding-top: 10px; padding-right: 40px">
            <li><a href="index.html" style="color: #000000"><span class="glyphicon glyphicon-log-in" data-toggle="modal" data-target="#myModal"></span> Logout</a></li>
        </ul>
    </div>
</nav>
<div class="circle" >
    <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal1"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" color='black' fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
        </svg></a>
</div>
<div class="cover">
</div>
<div class="ems">
    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
    </svg>
</div>
<div class="na">
    <div class="phone"><svg style="color: #E23C52 ;" xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
        </svg></div>
</div>
<div class="aa">

    <i class="fas fa-map-marker-alt"></i><br>
    <i class="fas fa-graduation-cap"></i>
    <div class="rate">
        <span style="font-size: 50px; color: #869791; font-weight: 600">4.5</span>&nbsp;&nbsp;
        <a style="color: gold "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
            </svg></a>
        <a style="color: gold "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
            </svg></a>
        <a style="color: gold "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
            </svg></a>
        <a style="color: gold "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
            </svg></a>
        <a style="color: gold "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
            </svg></a>
        <span class="numberofrates"  style="font-size: 20px; padding-left: 35%;padding-bottom: 10%;">125</span>&nbsp;&nbsp;<span  style="font-size: 15px; font-weight: 200;">reviews</span>
    </div>
</div>
<div class="aa2">
    <p class="BIO">BIO</p>
</div>
<div class="mysh">
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu
</div>





<div style="position:relative;" >
    <button style="width: 20%;height: 70px; padding: 20px;margin: 20px" type="button" data-toggle="modal" data-target="#myModal" onclick="" style="padding: 15px;margin: 20px;width: 30%;border-radius: 65px; box-shadow: 5px 10px;">
        <p style="font-family: 'Britannic Bold'">Share logo!</p>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </button>

</div>





<div id="myModal" class="modal fade" role="dialog" >
    <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content" style="border-radius: 20px;background-color:WHITE">
            <div class="modal-header" style="background-color: #e6f2ff;border-radius: 20px;border: none"   >
                <button type="button" class="close" data-dismiss="modal" style="border: none">&times;</button>
                <IMG src="GLO.png" width="60px" height="60px" style="float: left;margin: 15px">
                <pre style="background-color: #e6f2ff;border: none"></pre>
                <h3 class="modal-title" id="Sharee"><b>Share new logo</b></h3>

            </div>


            <div class="modal-body">
                <form method="post"  action="Designer.php" enctype="multipart/form-data">
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Your UserName" name="UserName" id='UserName' required>
                        <label for="UserName" class="form__label"> Your UserName</label>
                    </div>
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Name" name="Name" id="Name" required>
                        <label for="Name" class="form__label">Logo Name</label>
                    </div>
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Num Code for the new logo" name="NumCode" id='NumCode' required />
                        <label for="NumCode" class="form__label">NumCode for logo</label>
                    </div>
                    <pre style="background-color: white;border: none"></pre>
                    <div>
                        <label style="width: 20%;color: #c0c0a5">Type:</label>
                        <input type="radio" name="radio" id="male" name="state" value="Free" style="width: 10%;color: #2f2f2f" >
                        <label for="male" style="width: 20%">Free</label>
                        <input type="radio" name="radio" id="female" name="state" value="Paied" style="width: 10%">
                        <label for="female" style="width: 20%">Paied</label>
                    </div>
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Name" name="Salary" id='Salary' required style="width: 70%">
                        <label for="Salary" class="form__label">Salary</label>
                        $
                    </div>
                    <pre style="background-color: white;border: none"></pre>
                    <div>
                        <label>Field: </label>
                        <select id="Field" name="Field">
                            <option value="Medicine">Medicine</option>
                            <option value="Sport">Sport</option>
                            <option value="Education">Education</option>
                            <option value="loyalty">loyalty</option>
                        </select>
                    </div>
                    <pre style="background-color: white;border: none"></pre>
                    <div>
                        <label style="width: 30%">Description:</label>
                        <textarea id="w3review" name="Des" rows="2" cols="50">
                            </textarea>
                    </div>

                    <pre style="background-color: white;border: none"></pre>
                    <div>
                        <img src="im.png" style="width: 30px;height: 30px;float: left" >
                        <label style="margin: 7px">Choose image:</label></div>
                    <div>

                        <input type="file" id="file" name="file">
                        <button type="submit" name="share" id="share" type="button" style="margin: 2px;padding: 5px;height: 40px;border-radius: 15px"  >Share</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <input type="file">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</body>

</html>