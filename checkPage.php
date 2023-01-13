<?php
if ($_POST['type']==="Client") {
    $Email=$_POST['email'];
    $servername = "localhost";
    $Usernme = "root";
    $password = "";
    $dbname = "webpro";
    $conn = new mysqli($servername, $Usernme, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO Designer (Email)
        VALUES ('$Email')";

    if ($conn->query($sql) === TRUE) {
        echo "Succeeded";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
if ($_POST['type']==="Designer") {
    $Email=$_POST['email'];
    $servername = "localhost";
    $Usernme = "root";
    $password = "";
    $dbname = "webpro";
    $conn = new mysqli($servername, $Usernme, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO Designer (Email)
        VALUES ('$Email')";

    if ($conn->query($sql) === TRUE) {
        echo "Succeeded";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
