<?php
    $create = "
    CREATE TABLE admin (
    id_admin INT(2) AUTO_INCREMENT PRIMARY KEY,
    admin_account VARCHAR(10) NOT NULL UNIQUE,
    password VARCHAR(10) NOT NULL
);
    CREATE TABLE news (
    news_id INT(3) AUTO_INCREMENT PRIMARY KEY,
    news_title VARCHAR(255) NOT NULL,
    publish_date DATE NOT NULL,
    news_content TEXT NOT NULL,
    news_img VARCHAR(255),
    id_admin INT(2),
    FOREIGN KEY (id_admin) REFERENCES admin(id_admin)
);  
    CREATE TABLE category (
    category_id INT(3) AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL
);
    CREATE TABLE product (
    sku VARCHAR(20) PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    product_img VARCHAR(255),
    product_hover VARCHAR(255),
    product_price DECIMAL(10, 0) NOT NULL,
    product_description TEXT,
    product_quantity INT NOT NULL,
    trending BOOLEAN DEFAULT FALSE,
    new_arrival BOOLEAN DEFAULT FALSE,
    id_category INT(3),
    FOREIGN KEY (id_category) REFERENCES category(category_id)
);

    CREATE TABLE users (
    user_id INT(3) AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    user_email VARCHAR(100) NOT NULL,
    user_phone VARCHAR(10) NOT NULL,
    user_password VARCHAR(100) NOT NULL
);

    CREATE TABLE orders (
    order_id INT(3) AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    customer_address TEXT NOT NULL,
    customer_phone VARCHAR(10) NOT NULL,
    customer_email VARCHAR(255),
    total_bill DECIMAL(10, 0) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_id INT(3),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

    CREATE TABLE order_details (
    sku VARCHAR(20),
    order_id INT(3),
    user_id INT(3),
    order_quantity INT NOT NULL,
    price DECIMAL(10, 0) NOT NULL,
    total DECIMAL(10, 0) NOT NULL
);

    CREATE TABLE product_img (
    img_id INT(3) AUTO_INCREMENT PRIMARY KEY,
    img_url VARCHAR(255) NOT NULL,
    sku VARCHAR(20)
);
    CREATE TABLE contact (
    contact_id INT(3) AUTO_INCREMENT PRIMARY KEY,
    contact_name VARCHAR(255) NOT NULL,
    contact_email VARCHAR(100) NOT NULL,
    contact_phone VARCHAR(10) NOT NULL,
    contact_content TEXT NOT NULL
)";
//Kiểm tra kết nối
    if ($conn->multi_query($create)){
    do {
        if ($conn->errno) {
            echo "Lỗi: " .$conn->error. "<br>";
        }
    } while ($conn->next_result());
    echo "Tạo bảng thành công";
    } else {
        echo "Tạo bảng thất bại!";
    } 
?>