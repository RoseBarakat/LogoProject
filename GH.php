<?php
session_start();
if(isset($_SESSION['username'])){
$url="information.php";
header('location:'.$url);
exit();
}
else if(isset($_POST['username'])){
    $username=$_POST['username'];
    $_SESSION['username']=$username;
    $url="information.php";
    header('location:'.$url);
    exit();
}
session_destroy();
?>
<html>
<head>
<title>  </title>
</head>
<body>
<form method="post" action="GH.php">
    <input type="text" name="username" >
    <input type="submit" value="save">



</form>
<?php




?>










</body>

</html>
