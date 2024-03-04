<?php
    include 'db_connect.php';
   $productID = $_POST["productID"];

   $sql = "SELECT * FROM products WHERE productID = '$productID'";
   $query = $db_conn -> query($sql);
   $row = $query->fetch_assoc();
   $productArray = array();
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
   $productJson = json_encode($productArray);
   echo $productJson;