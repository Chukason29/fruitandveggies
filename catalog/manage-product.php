<?php include_once "./catalog-header.php"?>

<section id="start-display-manage">
        <img src="https://i.ibb.co/nbg91Y9/product-loader.gif" alt="product-loader" id="product-loader" border="0">
</section>
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
                        <th>High Price</th>
                        <th>Low Price</th>
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
                            <td id="<?php echo $row['productID']?>">
                                <button><i class="fa-regular fa-eye"></i></button>
                                <button onclick= "edit(this)"><i class="fa-regular fa-pen-to-square"></i></button>
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
<dialog id="manage-dialog">
    <form id="manage-product-form" action="" method="">
        <h2>Update Product Details</h2>
        <div id="manager-result"></div>
        <div>
            <input type="hidden" name="manage-product-id" id="manage-product-id">
        </div>
        <div class="input-div">
            <input type="text" name="manage-product-name" id="manage-product-name" placeholder="Enter Product Name">
        </div>
        <div class="input-div">
            <select name="manage-product-category" id="manage-product-category">
                <option value="---Product category---">---Product category---</option>
                <option value="FRUIT">FRUIT</option>
                <option value="VEGGIES">VEGGIES</option>
            </select>
        </div>
        <div class="input-div">
            <select name="manage-sub-category" id="manage-sub-category">
                <option value="---Sub category---">---Sub category---</option>
                <option value="LETTUCE">LETTUCE</option>
                <option value="STONE FRUITS">STONE FRUITS</option>
                <option value="TROPICAL FRUITS">TROPICAL FRUITS</option>
                <option value="BERRIES">BERRIES</option>
                <option value="NUTS">NUTS</option>
                <option value="MELON">MELON</option>
                <option value="GRAPES">GRAPES</option>
                <option value="PEPPER">PEPPER</option>
                <option value="DATES">DATES</option>
                <option value="HERBS">HERBS</option>
                <option value="SEEDS">SEEDS</option>
            </select>
        </div>
        <div class="input-div">
            <input type="number" min="0" name="manage-high-price" id="manage-high-price" placeholder="Old Price">
        </div>
        <div class="input-div">
            <input type="number" min="0" name="manage-low-price" id="manage-low-price" placeholder="New Price">
        </div>
        <div class="input-div">
            <input type="text" name="manage-image-link" id="manage-image-link" placeholder="Enter Image Link">
        </div>
        <div class="input-div">
            <input type="submit" value="update" name="update" id="update">
        </div>
    </form>
</dialog>
<?php include_once "./catalog-footer.php"?>