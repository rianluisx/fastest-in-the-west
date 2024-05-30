<?php 
    //insertion data from session to db

    session_start();
    include '../DBConnector.php';

    if (!isset($_SESSION['orders']) || empty($_SESSION['orders'])) {
        echo "<script>alert('No orders placed yet'); window.location.href = '../views/menu-view.php';</script>";
        exit();
    }
    //get order array object from session (food_ID => food_quantity)
    $orders = $_SESSION['orders'];
    $totalQuantity = 0;

    foreach ($orders as $food_ID => $food_quantity) {
        $totalQuantity += $food_quantity;
    }

    if ($totalQuantity === 0) {
        echo "<script>alert('No orders placed yet'); window.location.href = '../views/menu-view.php';</script>";
        exit();
    }
    //set appropriate timezone
    $timeZone = "Asia/Hong_Kong";
    $timeStamp = time();
    $dt = new DateTime("now", new DateTimeZone($timeZone)); 
    $dt->setTimestamp($timeStamp); 
    $orderDate = $dt->format("Y-m-d H:i:s");
    $customerName = $_SESSION['customer_name'];
    $customerAddress = $_SESSION['customer_address'];

    // insert customer to db
    $insertCustomer = "INSERT INTO customer (customer_name, customer_address) VALUES ('$customerName', '$customerAddress')";
    if ($conn->query($insertCustomer) === TRUE) {
        $_SESSION["customer_ID"] = $conn->insert_id;
    }

    //register order
    $customerID = $_SESSION["customer_ID"];
    $insertOrders = "INSERT INTO orders (customer_ID, order_date) VALUES ('$customerID', '$orderDate')";
    $ordersInserted = $conn->query($insertOrders);
    $orderID = $conn->insert_id;


    //insert each item of order to order_details db
    foreach ($orders as $foodID => $foodQuantity) {
        $foodPriceQuery = "SELECT price FROM menu WHERE food_ID = '$foodID';";
        $foodPrice = $conn->query($foodPriceQuery)->fetch_assoc()['price'];
        if ($foodQuantity > 0) {
            $orderPrice = $foodQuantity * $foodPrice;
            $insertOrderDetails = "INSERT INTO order_details (order_ID, food_ID, quantity, order_price) VALUES ('$orderID', '$foodID', '$foodQuantity', '$orderPrice')";
            $detailsInserted = $conn->query($insertOrderDetails);
            $setInventoryQuery = "UPDATE menu SET stock = stock - $foodQuantity WHERE food_ID = '$foodID';";
            $invetoryUpdate = $conn->query($setInventoryQuery);
        }
    }
    echo "<script> alert('Order Submitted'); </script>";
    header("refresh:1; url=../src/index.php");

?>
