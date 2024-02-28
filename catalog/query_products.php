<?php
    include(__DIR__.'/../db_connect.php');
    $sql = "SELECT * FROM Products";
    $query = $db_conn -> query($sql);
    $row = $query -> num_rows;
    echo $row;

?>
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Sub Category</th>
            <th>Low Price</th>
            <th>High Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $query->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['productName']?></td>
                <td><?php echo $row['product_category']?></td>
                <td><?php echo $row['sub_category']?></td>
                <td><?php echo $row['low_price']?></td>
                <td><?php echo $row['high_price']?></td>
                <td><?php echo $row['image_link']?></td>
                <td>
                    <button><i class="fa-regular fa-pen-to-square"></i></button>
                    <button><i class="fa-regular fa-trash-can"></i></button>
                </td>
                
            </tr>
        <?php endwhile?>
    </tbody>
</table>