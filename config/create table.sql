--create database polidoll
create table admin (
    id_admin INT identity PRIMARY KEY,
    admin_account VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
	)
create table news (
	news_id INT identity PRIMARY KEY,
    news_title VARCHAR(255) NOT NULL,
    publish_date DATE NOT NULL,
    news_content TEXT NOT NULL,
    id_admin INT,
    FOREIGN KEY (id_admin) REFERENCES admin(id_admin)
	)
create table category (
	category_id INT identity PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
	)
create table product (
    sku VARCHAR(50) PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    product_img VARCHAR(255),
    product_price DECIMAL(10, 2) NOT NULL,
    product_description TEXT,
    product_quantity INT NOT NULL,
    trending BIT DEFAULT 0,
    new_arrival BIT DEFAULT 0,
    id_category INT,
    FOREIGN KEY (id_category) REFERENCES category(category_id)
	)
create table orders (
    order_id INT identity PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    customer_address TEXT NOT NULL,
    customer_phone VARCHAR(15) NOT NULL,
    customer_email VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_id INT
	)
create table order_details (
    sku VARCHAR(50),
    order_id INT,
    user_id INT,
    order_quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (sku, order_id),
    FOREIGN KEY (sku) REFERENCES product(sku),
    FOREIGN KEY (order_id) REFERENCES orders(order_id)
)
create table users (
	user_id INT identity PRIMARY KEY,
	user_name varchar(100) not null,
	user_email varchar(100),
	user_phone varchar(15),
	user_password varchar(100),
	)
