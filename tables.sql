CREATE TABLE `Products` (
    sn INT PRIMARY KEY AUTO_INCREMENT,
    productID VARCHAR (255) NOT NULL,
    productName VARCHAR(255) NOT NULL,
    sub_category VARCHAR(100) NOT NULL,
    product_category VARCHAR(100) NOT NULL,
    high_price DECIMAL(10, 2) NOT NULL,
    low_price DECIMAL(10, 2) NOT NULL,
    image_link VARCHAR(1000) NOT NULL,
    dateAdded DATETIME
);