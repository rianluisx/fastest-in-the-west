<?php 

    include "../DBConnector.php";

    $insertOrders = "INSERT into menu (food_name, price, stock, food_image) VALUES 
                    ('Burger', 3.99, 100, '../foodImages/burger.png'),
                    ('Chicken', 5.65, 100, '../foodImages/burger.png'),
                    ('Spaghetti', 3.57, 100, '../foodImages/burger.png')";
    $conn->query($insertOrders);


    
?>