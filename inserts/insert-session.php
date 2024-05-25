<?php 
    session_start();
    include '../DBConnector.php';
    $order_date = date("Y-m-d h:i:s a");
    $customerName = $_SESSION['customer_name'];
    $customerAddress = $_SESSION['customer_address'];
    
    $insertCustomer = "INSERT INTO customer (customer_name, customer_address) VALUES ('$customerName', '$customerAddress')";
    if ($conn->query($insertCustomer) === TRUE) {
        $_SESSION["customer_ID"] = $conn->insert_id;
        // header("refresh: 1; url=../views/menu-view.php");
    }
    $customer_ID = $_SESSION["customer_ID"];
    $insertOrders = "INSERT INTO orders (customer_ID, order_date) VALUES ('$customer_ID', '$order_date')";
    $ordersInserted = $conn->query($insertOrders);
    $order_ID = $conn->insert_id;
    $orders = $_SESSION['orders'];
    foreach($orders as $food_ID => $food_quantity){
        $order_price = $food_quantity * 1;
        $insertOrderDetails = "INSERT INTO order_details (order_ID, food_ID, quantity, order_price) VALUES ('$order_ID', '$food_ID', '$food_quantity', '$order_price')";
        $detailsInserted = $conn->query($insertOrderDetails);
    }
    header("refresh:1; url=../src/index.php");
?>