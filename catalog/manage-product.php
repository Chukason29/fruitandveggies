<?php include_once "./catalog-header.php"?>

<section id="manage-product">
<?php include_once "./menu.php"?>
    <div id="add-product-form-container">
        <div>
            <?php
                include 'db_connect.php';
                $sql = "SELECT * FROM Products";
                $query = $db_conn -> query($sql);
                $row = $query -> num_rows;
                $sn = 1;
            ?>
            <table>
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Product Id</th>
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
                            <td><?php echo $sn?></td>
                            <td><?php echo $row['productID']?></td>
                            <td><?php echo $row['productName']?></td>
                            <td><?php echo $row['product_category']?></td>
                            <td><?php echo $row['sub_category']?></td>
                            <td><?php echo $row['low_price']?></td>
                            <td><?php echo $row['high_price']?></td>
                            <td>
                                <button><i class="fa-regular fa-eye"></i></button>
                                <button><i class="fa-regular fa-pen-to-square"></i></button>
                                <button><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                            
                        </tr>
                        <?php $sn++; ?>
                    <?php endwhile?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php include_once "./catalog-footer.php"?>