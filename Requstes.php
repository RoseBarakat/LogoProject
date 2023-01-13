<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Requstes</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <style>
        .form__group {
            position: relative;
            padding: 15px 0 0;
            margin-top: 10px;
            width: 100%;
        }

        .form__field {
            font-family: inherit;
            width: 100%;
            border: 0;
            border-bottom: 2px solid #9b9b9b;
            outline: 0;
            font-size: 1.3rem;
            color: black;
            padding: 7px 0;
            background: transparent;
            transition: border-color 0.2s;
        }
        .form__field::placeholder {
            color: transparent;
        }
        .form__field:placeholder-shown ~ .form__label {
            font-size: 1.3rem;
            cursor: text;
            top: 20px;
        }

        .form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 1rem;
            color: #9b9b9b;
        }

        .form__field:focus {
            padding-bottom: 6px;
            font-weight: 700;
            border-width: 3px;
            border-image: linear-gradient(to right, #11998e, #38ef7d);
            border-image-slice: 1;
        }
        .form__field:focus ~ .form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 1rem;
            color: #11998e;
            font-weight: 700;
        }

        /* reset input */
        .form__field:required, .form__field:invalid {
            box-shadow: none;
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
            <li><a href="Requstes.php"  > Requstes </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html"><span class="glyphicon glyphicon-log-in" data-toggle="modal" data-target="#myModal"></span> Logout</a></li>
        </ul>
    </div>
</nav>
<pre>    </pre>
<div><table class="table">
    <thead>
    <tr>
        <th scope="col">UserName</th>
        <th scope="col">Description</th>
        <th scope="col">Date</th>
        <th scope="col"> View</th>
    </tr>
    </thead>
        <?php
        $servername = "localhost";
        $Usernme = "root";
        $password = "";
        $dbname = "webpro";

        $conn = new mysqli($servername, $Usernme, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "select UserNameClient,Date,Description From clientrequstes where UserNameDesigner='000001'";
        $res = $conn->query($sql);
        if( $res && $res -> num_rows >0){
            while($row=$res->fetch_assoc()){
                $S=substr($row['Description'],0,17);
                $Points="...";
                $S=$S.$Points;
                echo "<tr><td>".$row['UserNameClient']."</td><td>".$S."</td><td>".$row['Date']."</td><td><button onclick='ff()'>View</button></td></tr> ";
            }
        echo "</table>";
        }
        else {
        echo "0 result";
        }
        $conn->close();
        ?>

</div>


</body>
<script>
    function ff(){
        window.alert("sometext");
    }
</script>
</html>