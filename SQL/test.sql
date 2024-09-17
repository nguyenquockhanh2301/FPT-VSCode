create TABLE categories(
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
);

create TABLE products(
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    price decima(12,4),
    qty int,
    thumbnail VARCHAR(255),
    description text,
    category_id int,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

create TABLE order_items(
    order_id int,
    product_id int,
    buy_qty int,
    FOREIGN KEY (order_id) REFERENCES order(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

create TABLE users(
    id int PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100)
);

create TABLE orders(
    id int PRIMARY KEY,
    created_at datetime,
    grand_total int,
    paid int(2),
    payment_method VARCHAR(20),
    shipping_address VARCHAR(255),
    customer_name VARCHAR(100),
    telephone VARCHAR(20),
    user_id int AUTO_INCREMENT,
    FOREIGN KEY (user_id) REFERENCES users(id)
)

