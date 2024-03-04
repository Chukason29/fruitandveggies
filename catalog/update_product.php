<?php
$valid = TRUE;
if (isset($_POST['update'])) {
    switch (true) {
        case (!isset($_POST['manager_product_name']) || empty($_POST['manager_product_name'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter product name
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (!preg_match('/^[A-Za-z- ]+$/', $_POST['manager_product_name'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter a valid product name
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case ($_POST['manager_product_category'] == '---Product category---'):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Select product category
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case ($_POST['manager_sub_category'] == '---Sub category---'):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Select sub category
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (!isset($_POST['manager_high_price']) || empty($_POST['manager_high_price'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter high price
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (!preg_match('/^[0-9]+$/', $_POST['manager_high_price'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter a valid price
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (!isset($_POST['manager_low_price']) || empty($_POST['manager_low_price'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter low price
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (!preg_match('/^[0-9]+$/', $_POST['manager_low_price'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter a valid low price
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (empty($_POST['manager_image_link'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Please Enter an Image link
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        default:
        // check file size

    
        //restraining file types to jpg, png, pdf, gif

    }
    if ($valid == TRUE) {
        $productName = $db_conn->real_escape_string(strtoupper($_POST['manager_product_name']));
        $product_category = $db_conn->real_escape_string(strtoupper($_POST['manager_product_category']));
        $sub_category = $db_conn->real_escape_string(strtoupper($_POST['manager_sub_category']));
        $low_price = $db_conn->real_escape_string(strtoupper($_POST['manager_low_price']));
        $high_price = $db_conn->real_escape_string(strtoupper($_POST['manager_high_price']));
        $image_link = $_POST['manager_image_link'];
        $productId = $_POST["product_id"];
        
        ########### THIS INSERT IS SENT TO THE GENERAL STUDENT TABLE#######################################
					###### Remember to change the afmuc_students			
    }
}
/*$insert_general_stmt->close();
$insert_stmt->close();
$db_conn->close();*/