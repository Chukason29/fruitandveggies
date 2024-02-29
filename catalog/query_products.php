<?php
    include "db_connect.php";
    $sql = "SELECT * FROM Products";
    $query = $db_conn -> query($sql);
    $row = $query -> num_rows;
    $productArray = array();
    while ($row = $query->fetch_assoc()) {
       $newArray = array(
        "id" => $row['productID'],
        "productName"=> $row['productName'],
        "category" => $row['product_category'],
        "subCategory" => $row['sub_category'],
        "lowPrice" => $row['high_price'],
        "highPrice" => $row['low_price'],
        "imageLink" => $row['image_link']
       );

       array_push($productArray, $newArray);
    }
    $productJson = json_encode($productArray);
    echo $productJson;
?>
