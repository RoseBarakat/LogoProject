<?php
session_start();
$Email = $_SESSION['Email'];
    $counter=0;
    if($counter==0){
$counter++;
    }
$servername = "localhost";
$Usernme = "root";
$password = "";
$dbname = "webpro";
$var="";
$var1="";
$var2="";

    $conn = new mysqli($servername, $Usernme, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select * From Designer where UserName=$s";
    $res = $conn->query($sql);
    $var="";
    $var1="";
    $var2="";
    if ($res && $res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $var = $row["FirstName"];
            $var1 = $row["LastName"];
            $var2=$row["Email"];
        }
    } else {
        echo "0 results";
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        label{
            width:20% ;
        }
        div[id=Filee]{
            margin: 15px 0;
        }
        input {
            margin: 15px 0;
        }
        input[type=text]{
            width: 30%;
            padding: 8px 8px;
            margin: 15px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: initial;
        }
        button[type=button]{
            border-radius: 5px;
            padding: 10px 10px;
            width: 38%;
        }
        input[id=UserName]{
            width:30%;

        }
        select{
            width:30%;
            padding: 8px 8px;
            margin: 15px 0;
        }
        div.S{
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        button{
            width:200px;
            height:70px;
            background: linear-gradient(to left top, #c32c71 50%, #b33771 50%);
            border-style: none;
            color:#fff;
            font-size: 23px;
            letter-spacing: 3px;
            font-family: "Arial Black";
            font-weight: 600;
            outline: none;
            cursor: pointer;
            position: relative;
            padding: 0px;
            overflow: hidden;
            transition: all .5s;
            box-shadow: 0px 1px 2px rgba(0,0,0,.2);
        }
        button span{
            position: absolute;
            display: block;
        }
        button span:nth-child(1){
            height: 3px;
            width:200px;
            top:0px;
            left:-200px;
            background: linear-gradient(to right, rgba(0,0,0,0), #f6e58d);
            border-top-right-radius: 1px;
            border-bottom-right-radius: 1px;
            animation: span1 2s linear infinite;
            animation-delay: 1s;
        }

        @keyframes span1{
            0%{
                left:-200px
            }
            100%{
                left:200px;
            }
        }
        button span:nth-child(2){
            height: 70px;
            width: 3px;
            top:-70px;
            right:0px;
            background: linear-gradient(to bottom, rgba(0,0,0,0), #f6e58d);
            border-bottom-left-radius: 1px;
            border-bottom-right-radius: 1px;
            animation: span2 2s linear infinite;
            animation-delay: 2s;
        }
        @keyframes span2{
            0%{
                top:-70px;
            }
            100%{
                top:70px;
            }
        }
        button span:nth-child(3){
            height:3px;
            width:200px;
            right:-200px;
            bottom: 0px;
            background: linear-gradient(to left, rgba(0,0,0,0), #f6e58d);
            border-top-left-radius: 1px;
            border-bottom-left-radius: 1px;
            animation: span3 2s linear infinite;
            animation-delay: 3s;
        }
        @keyframes span3{
            0%{
                right:-200px;
            }
            100%{
                right: 200px;
            }
        }

        button span:nth-child(4){
            height:70px;
            width:3px;
            bottom:-70px;
            left:0px;
            background: linear-gradient(to top, rgba(0,0,0,0), #f6e58d);
            border-top-right-radius: 1px;
            border-top-left-radius: 1px;
            animation: span4 2s linear infinite;
            animation-delay: 4s;
        }
        @keyframes span4{
            0%{
                bottom: -70px;
            }
            100%{
                bottom:70px;
            }
        }

        button:hover{
            transition: all .5s;
            transform: rotate(-3deg) scale(1.1);
            box-shadow: 0px 3px 5px rgba(0,0,0,.4);
        }
        button:hover span{
            animation-play-state: paused;
        }
        body{
            background: linear-gradient(to right, #f3f1f3 22%, #e0edf1 41%);
        }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">ROTA</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="Designer.php">Home</a></li>
            <li><a href="Information.php">My information </a></li>
            <li><a href="index.php"  > Requstes</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html"><span class="glyphicon glyphicon-log-in" data-toggle="modal" data-target="#myModal"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<div class="S" style="background: linear-gradient(to right, #f3f1f3 22%, #e0edf1 41%);;">
    <div id="Alertt" class="alert alert-success" role="alert" style="display: none">
        Saved Successfully!</div>
    <form style="">
        <label>Name:</label>

        <input type="text" id="fname" name="firstname" placeholder="Your First name" value="<?php echo $var ?>" >
        <input type="text" id="lname" name="lastname" placeholder="Your last name" value="<?php echo $var1 ?>">
        <div>
            <label>UserName:</label>
            <input type="text" id="UserName" value="<?php echo $s?>" name="lastname" placeholder="Your UserName" disabled >
        </div>
        <div>
            <label>Email:</label>
            <input type="text" id="Email" name="Email" placeholder="Your email" disabled value="<?php echo $var2?>"></div>
        <div>
            <label>Place </label>
            <select id="country" name="country">
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
                <option value="australia">Palestine</option>
                <option value="canada">Jordan</option>
                <option value="usa">Turkey</option>
                <option value="usa">Germany</option>
            </select>
            <input type="text" id="City" name="City" placeholder="Your City">
        </div>
        <div>
            <label>Date of Birth:</label>
            <input type="date" id="birthday" name="birthday">
        </div>

        <button type="button"  data-toggle="modal" data-target="#myModal" style="width:30%;font-size: 15px;height: 60px;background-color: #000000;">Change Password</button><button type="button" style="width: 30%;margin: 25px;height: 60px;font-size: 15px;background-color:#C2809A;" onclick="SaveChanges()">Save Changes</button>


    </form>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Change your Account password</h3>
            </div>
            <div class="modal-body">
                <form>
                    <div>
                        <label style="width: 25%">Old password:</label>
                        <input type="text" id="oldpassword" name="oldPass" placeholder="Your Old Password" required>
                    </div>
                    <div>
                        <label style="width: 25% ">New Password:</label>
                        <input type="text" id="newpassword" name="newPass" placeholder="Your New Password" required>
                    </div>
                    <div>
                        <label style="width: 25%">Confirm Password:</label>
                        <input type="text" id="confirmpassword" name="ConPass" placeholder="Confirm your Password" required>
                    </div>
                    <div>
                        <button type="button"  STYLE="alignment: center">OK</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

</body>

<script>
    function SaveChanges(){
    document.getElementById('Alertt').style.display="initial";
    setTimeout(function() {
           $('#Alertt').fadeOut('fast');
        }, 1000);
     }
</script>
</html>