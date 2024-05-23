CREATE TABLE customer (

    customer_ID INT(6) AUTO_INCREMENT,
    name VARCHAR(100),
    address VARCHAR(100),
    PRIMARY KEY (customer_ID)

) ENGINE=InnoDB;


CREATE TABLE menu (

    food_ID INT(6) AUTO_INCREMENT, 
    stock INT,
    price DECIMAL(10,2),
    food_name VARCHAR(60),
    food_image VARCHAR(60),
    PRIMARY KEY(food_ID)

) ENGINE=InnoDB;


CREATE TABLE orders (

    order_ID INT AUTO_INCREMENT,
    customer_ID INT (6),
    food_ID INT(6),
    -- PRIMARY KEY (order_id) no idea if i primary key ang orderid since what if ang user mag order twice? like
    -- would that have the same order_ID or a diff one
    PRIMARY KEY (order_ID),
    FOREIGN KEY (customer_ID) REFERENCES customer(customer_ID)

) ENGINE=InnoDB;


CREATE TABLE order_details(
    
    order_ID INT,
    food_ID INT(6),
    quantity INT,
    order_price DECIMAL(10,2),
    FOREIGN KEY (order_ID) REFERENCES orders(order_ID),
    FOREIGN KEY (food_ID) REFERENCES menu(food_ID)

) ENGINE = InnoDB;


