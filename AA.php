
<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Rota Pro</title>
    <style>
body{
    background-color: #E4ECFA;
}




    </style>
</head>
<body>
<h3>Choose the UserName to designer to know the percentage of his logos to all ones:</h3>
<pre>                                      <form action="data.php" method="post">
    <select name="Choice">
        <option value="000001">000001</option>
        <option value="000002">000002</option>
        <option value="000003">000003</option>
    </select>

    <input type="submit" value="Generate the Chart">
    </form></pre>
<div style="width: 60%">
    <canvas id="myChart"></canvas>
</div>
<script src="https://d3js.org/d3.v6.min.js"></script>
<script>
    <?php


    if (isset($_SESSION)&&!empty($_SESSION)) {
        $M1=$_SESSION['M1'];
        $M2=$_SESSION['M2'];
        $M3=$_SESSION['M3'];
        echo " var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['M1', 'M2', 'M3'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [$M1, $M2, $M3]
            }]
        },

        // Configuration options go here
        options: {}
    });";
    }

    ?>

</script>
</body>
</html>
