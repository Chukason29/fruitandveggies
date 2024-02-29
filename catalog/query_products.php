<?php
    include(__DIR__.'/../db_connect.php');
    $sql = "SELECT * FROM Products";
    $query = $db_conn -> query($sql);
    $row = $query -> num_rows;
    $productJson = json_encode($query->fetch_assoc());

    var_dump($productJson);
?>