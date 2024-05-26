<?php 
    session_start();
    include '../DBConnector.php';

    if (!isset($_SESSION['orders']) || empty($_SESSION['orders'])) {
        echo "<script>alert('No orders placed yet'); window.location.href = '../views/menu-view.php';</script>";
        exit();
    }

    $orders = $_SESSION['orders'];
    $totalQuantity = 0;

    foreach ($orders as $food_ID => $food_quantity) {
        $totalQuantity += $food_quantity;
    }

    if ($totalQuantity === 0) {
        echo "<script>alert('No orders placed yet'); window.location.href = '../views/menu-view.php';</script>";
        exit();
    }
    $time_zone = "Asia/Hong_Kong";
    $time_stamp = time();
    $dt = new DateTime("now", new DateTimeZone($time_zone)); 
    $dt->setTimestamp($time_stamp); 
    $order_date = $dt->format("Y-m-d H:i:s");
    $customerName = $_SESSION['customer_name'];
    $customerAddress = $_SESSION['customer_address'];

    $insertCustomer = "INSERT INTO customer (customer_name, customer_address) VALUES ('$customerName', '$customerAddress')";
    if ($conn->query($insertCustomer) === TRUE) {
        $_SESSION["customer_ID"] = $conn->insert_id;
    }

    $customer_ID = $_SESSION["customer_ID"];
    $insertOrders = "INSERT INTO orders (customer_ID, order_date) VALUES ('$customer_ID', '$order_date')";
    $ordersInserted = $conn->query($insertOrders);
    $order_ID = $conn->insert_id;

    foreach ($orders as $food_ID => $food_quantity) {
        $foodPriceQuery = "SELECT price FROM menu WHERE food_ID = '$food_ID';";
        $food_price = $conn->query($foodPriceQuery)->fetch_assoc()['price'];
        if ($food_quantity > 0) {
            $order_price = $food_quantity * $food_price;
            $insertOrderDetails = "INSERT INTO order_details (order_ID, food_ID, quantity, order_price) VALUES ('$order_ID', '$food_ID', '$food_quantity', '$order_price')";
            $detailsInserted = $conn->query($insertOrderDetails);
            $setInventoryQuery = "UPDATE menu SET stock = stock - $food_quantity WHERE food_ID = '$food_ID';";
            $invetoryUpdate = $conn->query($setInventoryQuery);
        }
    }
    echo "<script> alert('Order Submitted'); </script>";
    header("refresh:1; url=../src/index.php");

?>
