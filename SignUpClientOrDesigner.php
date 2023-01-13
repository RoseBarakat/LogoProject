<?php
session_start();
$Email = $_SESSION['Email'];
echo $Email;
$servername="localhost";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <title>Title</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <style>
        h2{
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
        }
        h1{
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
        }
        input{
            display: block;
            width: 20%;
            height: 70px;
            border-radius: 25px;
            outline: none;
            border: none;
            background-color : #E23C52;
            background-size: 100%;
            font-size: 1rem;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            cursor: pointer;

        }
        .center{
            margin: auto;
            width: 200%;

        }

        body{
            background: linear-gradient(to right, #f3f1f3 22%, #e0edf1 41%);
        }
    </style>
</head>
<body>
<h1><pre>                               Are You                                   </pre></h1>
<br>
 <div class="center"  style="display: flex" >


     <input type="button" class="btn" value="Client" style="background-color:#E23C52" onclick="b1()" ><pre><h2>         or            </h2> </pre>  <input type="button" class="btn" value="Designer" style="background-color: #E23C52" onclick="b2()">  </div> </pre></h2>

   <div style="display: flex"><pre>        </pre>    <img src="img/searcher.svg" style="height: 300px" width="250"> <pre>                                                       </pre>
        <img src="img/Designer.svg" style="height: 350px" width="300"></div>



</body>
<script >
    function b1(){
        console.log("Arrived to fun1");
        $.ajax({
            type: 'POST',
            url: 'checkPage.php',
            data: {type: "Client", email: '<?php echo $Email ?>'},
            success: function (response) {
                if(response=="Succeeded")document.location.href="Client.php";
            }
        });


    }
    function b2(){
        console.log("Arrived to fun2");
        $.ajax({
            type: 'POST',
            url: 'checkPage.php',
            data: {type: "Designer", email: '<?php echo $Email ?>'},
            success: function (response) {
                if(response=="Succeeded")document.location.href="Designer.php";
            }
        });


    }


</script>
</html>
