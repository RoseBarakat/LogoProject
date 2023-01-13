<!DOCTYPE html>
<html>
<head>
    <title>Add to cart functionality in php and mysql</title>
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">
    <script src="../library/js/jquery-3.2.1.min.js"></script>
    <script src="../library/js/bootstrap.js"></script>
</head>
<style >
    @import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");

    * {
        margin: 0;
        padding: 0;
    }

    html {
        box-sizing: border-box;
        font-size: 62.5%;
    }

    body {
        background-color: #eee;
        font-family: "Poppins", sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .grid {
        display: grid;
        width: 114em;
        grid-gap: 6rem;
        grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
        align-items: start;
    }

    .grid-item {
         width:200px;
        height: 400px;
        background-color: #fff;
        border-radius: 0.4rem;
        overflow: hidden;
        box-shadow: 0 3rem 6rem rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: 0.2s;
    }

    .grid-item:hover {
        transform: translateY(-0.5%);
        box-shadow: 0 4rem 8rem rgba(0, 0, 0, 0.5);
    }

    .card-img {
        display: block;
        width: 100%;
        height: 20rem;
        object-fit: cover;
    }

    .card-content {
        padding: 3rem;
    }

    .card-header {
        font-size: 3rem;
        font-weight: 500;
        color: #0d0d0d;
        margin-bottom: 1.5rem;
    }

    .card-text {
        font-size: 1.6rem;
        letter-spacing: 0.1rem;
        line-height: 1.7;
        color: #3d3d3d;
        margin-bottom: 2.5rem;
    }

    .card-btn {
        display: block;
        width: 100%;
        padding: 1.5rem;
        font-size: 2rem;
        text-align: center;
        color: #3363ff;
        background-color: #d8e0fd;
        border: none;
        border-radius: 0.4rem;
        transition: 0.2s;
        cursor: pointer;
        letter-spacing: 0.1rem;
    }

    .card-btn span {
        margin-left: 1rem;
        transition: 0.2s;
    }

    .card-btn:hover,
    .card-btn:active {
        background-color: #c2cffc;
    }

    .card-btn:hover span,
    .card-btn:active span {
        margin-left: 1.5rem;
    }

    @media only screen and (max-width: 60em) {
        body {
            padding: 3rem;
        }

        .grid {
            grid-gap: 3rem;
        }
    }

</style>
<body>
<div class="container">
		<pre style="padding: 0; margin: 0;">
		<h2 style="margin-top: 0px; padding-top: 0; padding-left: 5px; ">Education</h2></pre>
    <hr>

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
		    ?>
    <div class="grid" >
        <div class="grid-item" style=" margin-left: 15px">
            <div class="card">
                <img style="" class="card-img" src="<?=$row['UrlLogo'] ; ?>" alt="Rome" />
                <div class="card-content">
                    <h1 class="card-header"><?= $row['Name']; ?></h1>
                    <p class="card-text">
                        <?= $row['Description']; ?>
                    </p>
                    <button class="card-btn" width="150px">Visit <span>&rarr;</span></button>
                </div>
            </div>
        </div>


<?php } ?>
<?php } ?>
    </div>
<div class="row">
    <div class="col-md-12 text-right">
        <a href="" class="btn btn-success">Seats <span class="glyphicon glyphicon-play"></span></a>
    </div>
</div>
</div>
</body>
<script type="text/javascript">
