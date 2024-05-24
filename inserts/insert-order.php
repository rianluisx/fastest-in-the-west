<?php 

    include "../DBConnector.php";

    $food_ID = $_POST["food_ID"];
    $customer_ID = $_POST["customer_ID"];
    $order_quantity = $_POST["quantity"];
    $order_price = $_POST["price"];
    $order_date = $_POST["order_date"];

    $insertOrders = "INSERT INTO orders (customer_ID, food_ID, order_date) VALUES ('$customer_ID', '$food_ID', '$order_date')";
    $ordersInserted = $conn->query($insertOrders);

    if ($ordersInserted === TRUE) {
        $order_ID = $conn->insert_id;

        $insertOrderDetails = "INSERT INTO order_details (order_ID, food_ID, quantity, order_price) VALUES ('$order_ID', '$food_ID', '$order_quantity', '$order_price')";
        $detailsInserted = $conn->query($insertOrderDetails);

        if ($detailsInserted === TRUE) {
            
            echo "<script>
                var orderAgain = confirm('Order placed successfully! Would you like to order again?');
                if (orderAgain) {
                    window.location.href = '../views/menu-view.php'; 
                } else {
                    window.location.href = '../src/index.html'; 
                }

            </script>";
        }
    }

?>
