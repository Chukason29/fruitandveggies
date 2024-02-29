<?php include_once "./catalog-header.php"?>
<section id="add-product">
    <?php include_once "./menu.php"?>
    <div id="add-product-form-container">
        <form id="product-form" action="" method="POST" enctype=multipart/form-data>
            <h2>Add Product</h2>
            <div id="result"></div>
            <div class="input-div">
                <input type="text" name="product-name" id="product-name" placeholder="Enter Product Name">
            </div>
            <div class="input-div">
                <select name="product-category" id="product-category">
                    <option value="---Product category---">---Product category---</option>
                    <option value="Fruit">Fruit</option>
                    <option value="Veggies">Veggies</option>
                </select>
            </div>
            <div class="input-div">
                <select name="sub-category" id="sub-category">
                    <option value="---Sub category---">---Sub category---</option>
                    <option value="Lettuce">Lettuce</option>
                    <option value="Stone Fruits">Stone Fruits</option>
                    <option value="Tropical Fruits">Tropical Fruits</option>
                    <option value="Berries">Berries</option>
                    <option value="Nuts">Nuts</option>
                    <option value="Melon">Melon</option>
                    <option value="Grapes">Grapes</option>
                    <option value="Pepper">Pepper</option>
                    <option value="Dates">Dates</option>
                    <option value="Herbs">Herbs</option>
                    <option value="Seeds">Seeds</option>
                </select>
            </div>
            <div class="input-div">
                <input type="number" min="0" name="high-price" id="high-price" placeholder="Old Price">
            </div>
            <div class="input-div">
                <input type="number" min="0" name="low-price" id="low-price" placeholder="New Price">
            </div>
            <div class="input-div">
                <input type="text" name="image-link" id="image-link" placeholder="Enter Image Link">
            </div>
            <div class="input-div">
                <input type="submit" value="submit" name="submit" id="add-submit">
            </div>
        </form>
    </div>
    
</section>
<?php include_once "./catalog-footer.php"?>