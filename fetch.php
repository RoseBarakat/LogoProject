<?php
include('function.php');
$connection = new PDO( 'mysql:host=localhost;dbname=webpro', 'root', '' );
$query = '';
$output = array();



$query .= "SELECT * From clientrequstes";

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
    $S=substr($row['Description'],0,17);
    $Points="...";
    $S=$S.$Points;
    $sub_array = array();
    $sub_array[] = $row["UserNameClient"];
    $sub_array[] = $S;
    $sub_array[] = $row["Date"];
    $sub_array[] = '<button type="button"  name="View" id="'.$row["UserNameClient"].'" class="btn btn-primary btn-sm update">View</button>';
    $data[] = $sub_array;
}
$output = array(
    "draw"              =>  intval($_POST["draw"]),
    "recordsTotal"      =>  $filtered_rows,
    "recordsFiltered"   =>  get_total_all_records(),
    "data"              =>  $data
);
echo json_encode($output);
?>
