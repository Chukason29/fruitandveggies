<?php
include 'db_connect.php';
$targetDir =__DIR__ . "/../uploads/";
$stuNum_year = str_split(date('Y'));
$stuNum_year = $stuNum_year[2].$stuNum_year[3];
$stuNum_month = date('m');
$stuNum_day = date('w');
$stuNum_hour = date('H');
$stuNum_minute = date('i');
$stuNum_seconds = date('s');
$stuNum = "FAV".$stuNum_year.$stuNum_month.$stuNum_day.$stuNum_hour.$stuNum_minute.$stuNum_seconds;
$productId = "FAV".$stuNum_year.$stuNum_month.$stuNum_day.$stuNum_hour.$stuNum_minute.$stuNum_seconds;
$valid = TRUE;
if (isset($_POST['submit'])) {
    switch (true) {
        case (!isset($_POST['product_name']) || empty($_POST['product_name'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter product name
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (!preg_match('/^[A-Za-z- ]+$/', $_POST['product_name'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter a valid product name
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case ($_POST['product_category'] == '---Product category---'):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Select product category
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case ($_POST['sub_category'] == '---Sub category---'):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Select sub category
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (!isset($_POST['high_price']) || empty($_POST['high_price'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter high price
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (!preg_match('/^[0-9]+$/', $_POST['high_price'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter a valid price
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (!isset($_POST['low_price']) || empty($_POST['low_price'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter low price
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (!preg_match('/^[0-9]+$/', $_POST['low_price'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Enter a valid low price
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        case (empty($_FILES['product_image']['name'])):
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                        Please Upload an Image
                    </div> ";
            $valid = FALSE;
            exit;
            break;
        default:
        $fileName =  $stuNum.'.jpg';
        $realName = strtolower($_FILES['product_image']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($realName, PATHINFO_EXTENSION);
        
        // check file size
        if ($_FILES["product_image"]["size"] > 2000000) {
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                Sorry, your file is too large
                </div> ";
            $valid = FALSE;
            exit;
        }
        $fileType = strtolower($fileType);
    
        //restraining file types to jpg, png, pdf, gif
        $allowType = array('jpg');
        if (!in_array($fileType,$allowType)) {
            echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
            Only jpg format allowed
            </div> ";
            $valid = FALSE;
            exit;
        }
    }
    if ($valid == TRUE) {
        $productName = $db_conn->real_escape_string(strtoupper($_POST['product_name']));
        $product_category = $db_conn->real_escape_string(strtoupper($_POST['product_category']));
        $sub_category = $db_conn->real_escape_string(strtoupper($_POST['sub_category']));
        $low_price = $db_conn->real_escape_string(strtoupper($_POST['low_price']));
        $high_price = $db_conn->real_escape_string(strtoupper($_POST['high_price']));
        
        ########### THIS INSERT IS SENT TO THE GENERAL STUDENT TABLE#######################################
					###### Remember to change the afmuc_students
					$img = file_get_contents($_FILES['product_image']['tmp_name']);
					
					$insert_general_sql = "INSERT INTO `Products`(`productID`, `productName`, `sub_category`, `product_category`, `high_price`, `low_price`)
											VALUES (?, ?, ?, ?, ?, ?)";
					$insert_general_stmt = $db_conn->stmt_init();
					if (!$insert_general_stmt->prepare($insert_general_sql)) {
						echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
						Problem connecting to database
						</div> ";
						exit;
					}else{
						$insert_general_stmt->bind_param("ssssss", $productId, $productName, $product_category, $sub_category, $low_price, $high_price);
						$insert_general_stmt->execute();
						$insert_general_stmt->store_result();
					}
                    if(!move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFilePath)){//Uploads file once student number is verified to be unique
                        echo "<div class = 'alert alert-danger alert-dismissible w-100 mx-auto' role= 'alert'>
                            Problem Uploading passport
                        </div> ";
                        exit;
                    }
                    echo "<div class = 'alert alert-success alert-dismissible w-100 mx-auto' role= 'alert'>
                        $productName Added Succesfully
                    </div>";
    }
}
/*$insert_general_stmt->close();
$insert_stmt->close();
$db_conn->close();*/