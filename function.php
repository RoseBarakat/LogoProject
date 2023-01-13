<?php

function get_total_all_records()
{
    $connection = new PDO( 'mysql:host=localhost;dbname=webpro', 'root', '' );
    $statement = $connection->prepare("SELECT * FROM clientrequstes ");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}

?>