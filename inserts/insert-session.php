<?php 
    session_start();
    include '../DBConnector.php';
    $date = date("Y-m-d h:i:s a");
    $customerName = $_SESSION['customer_name'];
    $customerAddress = $_SESSION['customer_address'];
    $order_ID = $_SESSION['order_ID'];
    $insertCustomer = "INSERT INTO customer (customer_name, customer_address) VALUES ('$customerName', '$customerAddress')";
    if ($conn->query($insertCustomer) === TRUE) {
        $_SESSION["customer_ID"] = $conn->insert_id;
        header("refresh: 1; url=../views/menu-view.php");
    }
?>