<?php
$servername = "localhost";
$Usernme = "root";
$password = "";
$dbname = "webpro";
$var="";
$var1="";
$var2="";
$count=0;
$pageContent="";
$conn = new mysqli($servername, $Usernme, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "select * From Logo ";
$res = $conn->query($sql);
if ($res && $res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
$pageContent .= '                  
<div class="col=md-3" style="margin-bottom: 36px">
<img  src='.$row["UrlLogo"].' class="img-responsive img-thumbnail" style="width: 50px; height:50">
<h4>'.$row["Type"] .'</h4>

</div>
';

    }
    $pageContent .='<div style="clear:both"> ';
}
 /*     if($count==0){
          $pageContent .='
          <div id="#'.$row["CodeNum"].'"class="tab-pane fade in active" >
          ';

      }else{
          $pageContent .='
          <div id="#'.$row["CodeNum"].'"class="tab-pane fade " >
          ';
      }
      $count++;
    }*/

?>
<html>
<head>
    <title>Webslesson Tutorial | Create Dynamic Tab by using Bootstrap in PHP Mysql</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="tab-content" >
<br />
<?php
echo $pageContent;
?>
</div>


</body>


</html>
