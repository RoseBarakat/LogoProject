<?php
$connection = new PDO( 'mysql:host=localhost;dbname=webpro', 'root', '' );
include ('function.php');

if(isset($_POST["_id"])) {
    $id=$_POST["_id"];
    $stat = $connection->prepare("Select * from client where UserName=' $id'");
    $stat->execute();
    $result = $stat->fetchAll();
    $output = array();
    foreach($result as $row){
        if($_POST['_id'] == $row["Email"]){
          $output["Email"]=$row["Email"]  ;
        }
    }
    $statment = $connection->prepare("Select * from clientrequstes where UserNameDesigner='000001'");
    $statment->execute();
    $result = $statment->fetchAll();

    foreach ($result as $row) {
        if ($_POST['_id'] == $row["UserNameClient"]) {
            $output["UserNameDesigner"] = $row["UserNameDesigner"];
            $output["UserNameClient"] = $row["UserNameClient"];
            $output["Description"] = $row["Description"];
            $output["Date"] = $row["Date"];
        }
    }

echo json_encode($output);
}
?>
